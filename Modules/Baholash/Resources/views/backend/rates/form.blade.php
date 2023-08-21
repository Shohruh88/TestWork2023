<div class="row">
    @isset($$module_name_singular)
        <input type="hidden" name="id" value="{{optional($$module_name_singular)->id }}">
    @endisset
    <div class="col-6 col-md-3">
        <div class="form-group">
            <?php
            $field_name = 'employee_id';
            $field_label = __('labels.backend.baholash.fields.employee');
            $field_relation = "employee";
            $field_placeholder = __("Select an option");
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name,  (isset($users) ? $users : '') )->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            <?php
            $field_name = 'theme_id';
            $field_label = __('labels.backend.mavzular.fields.name');
            $field_relation = "theme";
            $field_placeholder = __("Select an option");
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('mavzu', 'id'): (isset($types) ? $types : ''))->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    @if($module_action == 'Edit')
        <div class="col-6 col-md-3">
            <div class="form-group">
                <?php
                $field_name = 'manager_id';
                $field_label = __('labels.backend.baholash.fields.manager');
                $field_relation = "manager";
                $field_placeholder = __("Select an option");
                $required = "";
                ?>
                {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                {{ html()->select($field_name, (isset($managers) ? $managers : ''))->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
            </div>
        </div>
    @endif
</div>
<div class="row">
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ html()->label(__('Ko\'rsatkich 1'))->class('col-md-12 form-control-label')->for('k1') }}
            <div class="col-sm-12">
                {{ html()->text('k1')
                    ->class('form-control')
                    ->placeholder(__('0-100'))
                    ->attribute('maxlength', 3)
                    ->required() }}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ html()->label(__('Ko\'rsatkich 2'))->class('col-md-12 form-control-label')->for('k2') }}
            <div class="col-sm-12">
                {{ html()->text('k2')
                    ->class('form-control')
                    ->placeholder(__('0-100'))
                    ->attribute('maxlength', 3)
                    ->required() }}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ html()->label(__('Ko\'rsatkich 3'))->class('col-md-12 form-control-label')->for('k3') }}
            <div class="col-sm-12">
                {{ html()->text('k3')
                    ->class('form-control')
                    ->placeholder(__('0-100'))
                    ->attribute('maxlength', 3)
                    ->required() }}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group">
            {{ html()->label(__('Ko\'rsatkich 4'))->class('col-md-12 form-control-label')->for('k4') }}
            <div class="col-sm-12">
                {{ html()->text('k4')
                    ->class('form-control')
                    ->placeholder(__('0-100'))
                    ->attribute('maxlength', 3)
                    ->required() }}
            </div>
        </div>
    </div>
</div>
