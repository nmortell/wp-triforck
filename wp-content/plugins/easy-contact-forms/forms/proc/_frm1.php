<div class='ufo-customform-fieldform'><div id='ufo-customform-settings-showlabel-fieldset' class='ufo-customform-fieldform-fieldset ufo-id-link'><div class='ufo-customform-fieldform-fieldset-legend'><span id='ufo-customform-settings-showlabel-expander' class='ufo-customform-fieldform-fieldset-expander ufo-id-link' onclick='ufoCf.expanderClick(this.id, "ufo-customform-settings-showlabel");'>&nbsp;</span><input type='hidden' id='ShowLabelHint' value='<?php echo EasyContactFormsT::get('CF_Hint_ShowLabel');?>' class='ufo-id-link'><div><input type='checkbox' id='ShowLabel' value='<?php echo isset($ShowLabel) && $ShowLabel == 'on' ? 'on' : 'off';?>' <?php echo isset($ShowLabel) && $ShowLabel == 'on' ? 'checked' : '';?> class='ufo-formvalue ufo-customform-fieldform-fieldset-cb' onchange='this.value=(this.checked)?"on":"off";'><label for='ShowLabel' style='width:auto;font-family:Arial;clear:none;display:block;margin:0;float:none;font-size:12px;padding:0;line-height:16px'><?php echo EasyContactFormsT::get('CF_ShowLabel');?><span id='ShowLabelHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label></div></div><div id='ufo-customform-settings-showlabel' class='ufo-customform-fieldform-fieldset-hidden ufo-id-link'><div><label for='Label'><?php echo EasyContactFormsT::get('CF_Label');?><span id='LabelHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='LabelHint' value='<?php echo EasyContactFormsT::get('CF_Hint_Label');?>' class='ufo-id-link'><input type='string' id='Label' value='<?php echo isset($Label) ? $Label : '';?>' class='ufo-formvalue textinput ufo-text' style='width:100%'><input type='hidden' value='var c = {};c.id = "Label";c.events = {};c.events.blur = [];c.required={};c.required.msg=AppMan.resources.ThisFieldIsRequired;c.events.blur.push("required");c.invClass = "ufo-fields-invalid-field";AppMan.addValidation(c);' class='ufo-eval'><div id='Label-invalid' class='ufo-fields-invalid-value ufo-id-link' style='display:none'></div></div><div id='ufo-customform-settings-showlabel-advanced-fieldset' class='ufo-customform-fieldform-fieldset ufo-id-link'><div class='ufo-customform-fieldform-fieldset-legend'><span id='ufo-customform-settings-showlabel-advanced-expander' class='ufo-customform-fieldform-fieldset-expander ufo-id-link' onclick='ufoCf.expanderClick(this.id, "ufo-customform-settings-showlabel-advanced");'>&nbsp;</span><span class='ufo-customform-fieldform-fieldset-legend-label'><?php echo EasyContactFormsT::get('CF_Advanced');?></span></div><div id='ufo-customform-settings-showlabel-advanced' class='ufo-customform-fieldform-fieldset-hidden ufo-id-link'><div><label for='LabelCSSClass'><?php echo EasyContactFormsT::get('CF_LabelCSSClass');?><span id='LabelCSSClassHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='LabelCSSClassHint' value='<?php echo EasyContactFormsT::get('CF_Hint_LabelCSSClass');?>' class='ufo-id-link'><input type='string' id='LabelCSSClass' value='<?php echo isset($LabelCSSClass) ? $LabelCSSClass : '';?>' class='ufo-formvalue textinput ufo-text' style='width:100%'></div><div><label for='LabelCSSStyle'><?php echo EasyContactFormsT::get('CF_LabelCSSStyle');?><span id='LabelCSSStyleHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='LabelCSSStyleHint' value='<?php echo EasyContactFormsT::get('CF_Hint_LabelCSSStyle');?>' class='ufo-id-link'><div><textarea id='LabelCSSStyle' class='ufo-formvalue textinput ufo-textarea' style='width:95%'><?php echo $LabelCSSStyle;?></textarea></div></div></div></div></div></div><div id='ufo-customform-settings-showdescription-fieldset' class='ufo-customform-fieldform-fieldset ufo-id-link'><div class='ufo-customform-fieldform-fieldset-legend'><span id='ufo-customform-settings-showdescription-expander' class='ufo-customform-fieldform-fieldset-expander ufo-id-link' onclick='ufoCf.expanderClick(this.id, "ufo-customform-settings-showdescription");'>&nbsp;</span><input type='hidden' id='ShowDescriptionHint' value='<?php echo EasyContactFormsT::get('CF_Hint_ShowDescription');?>' class='ufo-id-link'><div><input type='checkbox' id='ShowDescription' value='<?php echo isset($ShowDescription) && $ShowDescription == 'on' ? 'on' : 'off';?>' <?php echo isset($ShowDescription) && $ShowDescription == 'on' ? 'checked' : '';?> class='ufo-formvalue ufo-customform-fieldform-fieldset-cb' onchange='this.value=(this.checked)?"on":"off";'><label for='ShowDescription' style='width:auto;font-family:Arial;clear:none;display:block;margin:0;float:none;font-size:12px;padding:0;line-height:16px'><?php echo EasyContactFormsT::get('CF_ShowDescription');?><span id='ShowDescriptionHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label></div></div><div id='ufo-customform-settings-showdescription' class='ufo-customform-fieldform-fieldset-hidden ufo-id-link'><div><label for='Description'><?php echo EasyContactFormsT::get('CF_Description');?><span id='DescriptionHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='DescriptionHint' value='<?php echo EasyContactFormsT::get('CF_Hint_Description');?>' class='ufo-id-link'><div><textarea id='Description' class='ufo-formvalue textinput ufo-textarea' style='width:95%'><?php echo $Description;?></textarea></div></div><div><label for='DescriptionPosition'><?php echo EasyContactFormsT::get('CF_DescriptionPosition');?></label><select id='DescriptionPosition' class='ufo-formvalue inputselect ufo-select' style='width:100%'><option value='top' <?php echo $DescriptionPosition == 'top' ? ' selected' : '';?>>top</option><option value='top-inside' <?php echo $DescriptionPosition == 'top-inside' ? ' selected' : '';?>>top-inside</option><option value='bottom' <?php echo $DescriptionPosition == 'bottom' ? ' selected' : '';?>>bottom</option><option value='bottom-inside' <?php echo $DescriptionPosition == 'bottom-inside' ? ' selected' : '';?>>bottom-inside</option></select></div><div id='ufo-customform-settings-showdescription-advanced-fieldset' class='ufo-customform-fieldform-fieldset ufo-id-link'><div class='ufo-customform-fieldform-fieldset-legend'><span id='ufo-customform-settings-showdescription-advanced-expander' class='ufo-customform-fieldform-fieldset-expander ufo-id-link' onclick='ufoCf.expanderClick(this.id, "ufo-customform-settings-showdescription-advanced");'>&nbsp;</span><span class='ufo-customform-fieldform-fieldset-legend-label'><?php echo EasyContactFormsT::get('CF_Advanced');?></span></div><div id='ufo-customform-settings-showdescription-advanced' class='ufo-customform-fieldform-fieldset-hidden ufo-id-link'><div><label for='DescriptionCSSClass'><?php echo EasyContactFormsT::get('CF_DescriptionCSSClass');?><span id='DescriptionCSSClassHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='DescriptionCSSClassHint' value='<?php echo EasyContactFormsT::get('CF_Hint_DescriptionCSSClass');?>' class='ufo-id-link'><input type='string' id='DescriptionCSSClass' value='<?php echo isset($DescriptionCSSClass) ? $DescriptionCSSClass : '';?>' class='ufo-formvalue textinput ufo-text' style='width:100%'></div><div><label for='DescriptionCSSStyle'><?php echo EasyContactFormsT::get('CF_DescriptionCSSStyle');?><span id='DescriptionCSSStyleHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='DescriptionCSSStyleHint' value='<?php echo EasyContactFormsT::get('CF_Hint_DescriptionCSSStyle');?>' class='ufo-id-link'><div><textarea id='DescriptionCSSStyle' class='ufo-formvalue textinput ufo-textarea' style='width:95%'><?php echo $DescriptionCSSStyle;?></textarea></div></div></div></div></div></div><div id='ufo-customform-settings-setstyle-fieldset' class='ufo-customform-fieldform-fieldset ufo-id-link'><div class='ufo-customform-fieldform-fieldset-legend'><span id='ufo-customform-settings-setstyle-expander' class='ufo-customform-fieldform-fieldset-expander ufo-id-link' onclick='ufoCf.expanderClick(this.id, "ufo-customform-settings-setstyle");'>&nbsp;</span><input type='hidden' id='SetStyleHint' value='<?php echo EasyContactFormsT::get('CF_Hint_SetStyle');?>' class='ufo-id-link'><div><input type='checkbox' id='SetStyle' value='<?php echo isset($SetStyle) && $SetStyle == 'on' ? 'on' : 'off';?>' <?php echo isset($SetStyle) && $SetStyle == 'on' ? 'checked' : '';?> class='ufo-formvalue ufo-customform-fieldform-fieldset-cb' onchange='this.value=(this.checked)?"on":"off";'><label for='SetStyle' style='width:auto;font-family:Arial;clear:none;display:block;margin:0;float:none;font-size:12px;padding:0;line-height:16px'><?php echo EasyContactFormsT::get('CF_SetStyle');?><span id='SetStyleHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label></div></div><div id='ufo-customform-settings-setstyle' class='ufo-customform-fieldform-fieldset-hidden ufo-id-link'><div><label for='id' style='width:auto;margin-left:0;font-family:Arial;display:inline;margin:4px;font-size:12px;line-height:16px;padding:0'><?php echo EasyContactFormsT::get('CF_id');?></label><span id='id' class='ufo-formvalue ufo-customform-fieldform-fieldset-span'><?php echo isset($id) ? $id : '';?></span></div><div><label for='CSSClass'><?php echo EasyContactFormsT::get('CF_CSSClass');?><span id='CSSClassHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='CSSClassHint' value='<?php echo EasyContactFormsT::get('CF_Hint_CSSClass');?>' class='ufo-id-link'><input type='string' id='CSSClass' value='<?php echo isset($CSSClass) ? $CSSClass : '';?>' class='ufo-formvalue textinput ufo-text' style='width:100%'></div><div><label for='CSSStyle'><?php echo EasyContactFormsT::get('CF_CSSStyle');?><span id='CSSStyleHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label><input type='hidden' id='CSSStyleHint' value='<?php echo EasyContactFormsT::get('CF_Hint_CSSStyle');?>' class='ufo-id-link'><div><textarea id='CSSStyle' class='ufo-formvalue textinput ufo-textarea' style='width:95%'><?php echo $CSSStyle;?></textarea></div></div><div><label for='AddCF'><?php echo EasyContactFormsT::get('CF_AddCF');?></label><input type='checkbox' id='AddCF' value='<?php echo isset($AddCF) && $AddCF == 'on' ? 'on' : 'off';?>' <?php echo isset($AddCF) && $AddCF == 'on' ? 'checked' : '';?> class='ufo-formvalue ufo-customform-fieldform-fieldset-cb' onchange='this.value=(this.checked)?"on":"off";'></div></div></div><div id='ufo-customform-settings-setsize-fieldset' class='ufo-customform-fieldform-fieldset ufo-id-link'><div class='ufo-customform-fieldform-fieldset-legend'><span id='ufo-customform-settings-setsize-expander' class='ufo-customform-fieldform-fieldset-expander ufo-id-link' onclick='ufoCf.expanderClick(this.id, "ufo-customform-settings-setsize");'>&nbsp;</span><input type='hidden' id='SetSizeHint' value='<?php echo EasyContactFormsT::get('CF_Hint_SetSize');?>' class='ufo-id-link'><div><input type='checkbox' id='SetSize' value='<?php echo isset($SetSize) && $SetSize == 'on' ? 'on' : 'off';?>' <?php echo isset($SetSize) && $SetSize == 'on' ? 'checked' : '';?> class='ufo-formvalue ufo-customform-fieldform-fieldset-cb' onchange='this.value=(this.checked)?"on":"off";'><label for='SetSize' style='width:auto;font-family:Arial;clear:none;display:block;margin:0;float:none;font-size:12px;padding:0;line-height:16px'><?php echo EasyContactFormsT::get('CF_SetSize');?><span id='SetSizeHin' class='ufo-settingsform-label-hint ufo-label-hint ufo-id-link'>[<a>?</a>]</span></label></div></div><div id='ufo-customform-settings-setsize' class='ufo-customform-fieldform-fieldset-hidden ufo-id-link'><div><label for='Width'><?php echo EasyContactFormsT::get('CF_Width');?></label><div style='clear:left'></div><div style='position:relative;padding-right:100px'><input type='string' id='Width' value='<?php echo $Width;?>' class='ufo-formvalue textinput ufo-text' style='width:100%'><select id='WidthUnit' class='ufo-formvalue inputselect ufo-select' style='right:0;position:absolute;top:0;width:99px'><option value='px' <?php echo $WidthUnit == 'px' ? ' selected' : '';?>>px</option><option value='%' <?php echo $WidthUnit == '%' ? ' selected' : '';?>>%</option><option value='em' <?php echo $WidthUnit == 'em' ? ' selected' : '';?>>em</option></select></div><input type='hidden' value='var c = {};c.id = "Width";c.events = {};c.events.blur = [];c.integer={};c.integer.msg=AppMan.resources.ThisIsAnIntegerField;c.events.blur.push("integer");c.required={};c.required.msg=AppMan.resources.ThisFieldIsRequired;c.events.blur.push("required");c.invClass = "ufo-fields-invalid-field";AppMan.addValidation(c);' class='ufo-eval'><div id='Width-invalid' class='ufo-fields-invalid-value ufo-id-link' style='display:none'></div></div></div></div></div>