<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$options = ['' => 'Select option'] + $options;
?>
<div class="form-group">
    @if (isset($attributes['label']))
    {{ Form::label($name, $attributes['label'], ['class' => '']) }}
    @else
    {{ Form::label($name, null, ['class' => '']) }}
    @endif
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="material-icons prefix">unfold_more</i>
            </div>
        </div>
        {{ Form::select($name, $options, $value, ['class' => 'custom-select']) }}
    </div>
</div>