<div id="edit_pathology_categories_modal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"
                    id="exampleModalLabel">{{ __('messages.pathology_category.edit_pathology_category') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'editPathologyCategoryForm','method' => 'patch']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editPCategoryErrorsBox"></div>
                {{ Form::hidden('pathologyCategoryId',null,['id'=>'pathologyCategoryId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.pathology_category.name').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('name', '', ['id'=>'editPathologyCategoryName','class' => 'form-control ','required','placeholder'=>__('messages.pathology_category.name')]) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'editPathologyCategorySave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" aria-label="Close" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
