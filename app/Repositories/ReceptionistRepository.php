<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Department;
use App\Models\Receptionist;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
/**
 * Class ReceptionistRepository
 *
 * @version February 14, 2020, 9:14 am UTC
 */
class ReceptionistRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'full_name',
        'email',
        'phone',
        'education',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return Receptionist::class;
    }

    public function store($input, $mail = true)
    {
        $settings = App::make(SettingRepository::class)->getSyncList();
        try {
            $input['department_id'] = Department::whereName('Receptionist')->first()->id;
            $input['password'] = Hash::make($input['password']);
            $input['dob'] = (!empty($input['dob'])) ? $input['dob'] : null;
            $input['language'] = $settings['default_lang'];
            $input['phone'] = preparePhoneNumber($input, 'phone');

            $user = User::create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $mediaId = storeProfileImage($user, $input['image']);
            }

            $receptionist = Receptionist::create(['user_id' => $user->id]);
            $ownerId = $receptionist->id;
            $ownerType = Receptionist::class;

            if (!empty($address = Address::prepareAddressArray($input))) {
                Address::create(array_merge($address, ['owner_id' => $ownerId, 'owner_type' => $ownerType]));
            }

            $user->update(['owner_id' => $ownerId, 'owner_type' => $ownerType]);
            $user->assignRole($input['department_id']);

             // Update the email_verified_at field
             $user->update(['email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')]);

            // Attempt to send email and handle any exceptions
            if ($mail) {
                try {
                    $user->sendEmailVerificationNotification();
                } catch (Exception $e) {
                    Log::error('Error sending email: ' . $e->getMessage());
                    // Continue with the process even if email sending fails
                }
            }

            // Flash a success message
            session()->flash('success', 'User created successfully!');

        } catch (Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error creating user: ' . $e->getMessage());

            // Flash an error message
            session()->flash('error', 'An error occurred while creating the user. Please try again.');

            // Optionally return false or redirect to an error page
            return false;
        }

        // Redirect to success page or return true
        return true;
    }

    public function update($receptionist, $input)
    {
        try {
            unset($input['password']);

            $user = User::find($receptionist->user->id);
            if ($input['avatar_remove'] == 1 && isset($input['avatar_remove']) && ! empty($input['avatar_remove'])) {
                removeFile($user, User::COLLECTION_PROFILE_PICTURES);
            }
            if (isset($input['image']) && ! empty($input['image'])) {
                $mediaId = updateProfileImage($user, $input['image']);
            }

            $input['dob'] = (! empty($input['dob'])) ? $input['dob'] : null;
            $input['phone'] = preparePhoneNumber($input, 'phone');
            $receptionist->user->update($input);
            $receptionist->update($input);

            if (! empty($receptionist->address)) {
                if (empty($address = Address::prepareAddressArray($input))) {
                    $receptionist->address->delete();
                }
                $receptionist->address->update($input);
            } else {
                if (! empty($address = Address::prepareAddressArray($input)) && empty($receptionist->address)) {
                    $ownerId = $receptionist->id;
                    $ownerType = Receptionist::class;
                    Address::create(array_merge($address, ['owner_id' => $ownerId, 'owner_type' => $ownerType]));
                }
            }

            return true;
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
