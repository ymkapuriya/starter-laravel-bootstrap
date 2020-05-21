<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = str_replace('_', '-', $name);
?>
<div class="form-group">
    @if (isset($attributes['label']))
    {{ Form::label($id, $attributes['label'], ['class' => '']) }}
    @else
    {{ Form::label($id, null, ['class' => '']) }}
    @endif
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="material-icons prefix">smartphone</i>
            </div>
        </div>
        <input type="tel" id="{{ $id }}" name="{{ $name }}" placeholder="XXXXXXXXXX" value="{{ $value }}" pattern="[0-9]{10}" class="form-control">
    </div>
</div>