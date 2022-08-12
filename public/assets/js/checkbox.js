jQuery(document).ready(function() {

    function colors_change_uncheckall(tthis)
    {
        var this_color = tthis.parents('label');
        if(this_color.hasClass('blue'))
        {
            this_color.removeClass('blue').addClass('red');
        }
        if(this_color.hasClass('green'))
        {
            this_color.removeClass('green').addClass('black');
        }
        var red_size = tthis.parents('.permissions-row').find('label.red').size();
        var green_size = tthis.parents('.permissions-row').find('label.green').size();
        if((red_size>0) || (green_size>0))
        {
            jQuery('.input-customrole').val('Yes');
        }
        else
        {
            jQuery('.input-customrole').val('No');
        }
    }
    jQuery(document).on('click','.uncheck-all',function() {
        jQuery('.permissions-row .mycheckbox').each(function() {
            jQuery(this).removeAttr('checked').removeClass('undetermined');
            colors_change_uncheckall(jQuery(this));
        });
        jQuery(this).text($(this).attr("data-check-name")).removeClass('uncheck-all').addClass('check-all');
        return false;
    });

    jQuery(document).on('click','.check-all',function() {
        jQuery('.permissions-row .mycheckbox').each(function() {
            jQuery(this).prop('checked',true);
            colors_change_parent_checked(jQuery(this));
        });
        jQuery(this).text($(this).attr("data-uncheck-name")).removeClass('check-all').addClass('uncheck-all');
        return false;
    });

    function colors_change_parent_checked(tthis)
    {
        var this_color = tthis.parents('label');
        if(this_color.hasClass('black'))
        {
            this_color.removeClass('black').addClass('green');
        }
        if(this_color.hasClass('red'))
        {
            this_color.removeClass('red').addClass('blue');
        }
        var red_size = tthis.parents('.permissions-row').find('label.red').size();
        var green_size = tthis.parents('.permissions-row').find('label.green').size();
        if((red_size>0) || (green_size>0))
        {
            jQuery('.input-customrole').val('Yes');
        }
        else
        {
            jQuery('.input-customrole').val('No');
        }
    }
    function colors_change_parent_unchecked(tthis)
    {
        var this_color = tthis.parents('label');
        if(this_color.hasClass('blue'))
        {
            this_color.removeClass('blue').addClass('red');
        }
        if(this_color.hasClass('green'))
        {
            this_color.removeClass('green').addClass('black');
        }
        var red_size = tthis.parents('.permissions-row').find('label.red').size();
        var green_size = tthis.parents('.permissions-row').find('label.green').size();
        if((red_size>0) || (green_size>0))
        {
            jQuery('.input-customrole').val('Yes');
        }
        else
        {
            jQuery('.input-customrole').val('No');
        }
    }

    function mycheckbox(tthis)
    {
        var child = tthis.attr('data-child');
        var childno = tthis.parents('ul').find('.ccheckbox[data-child="'+child+'"]').size();
        var childcheckedno = tthis.parents('ul').find('.ccheckbox[data-child="'+child+'"]:checked').size();
        if(tthis.prop('checked')==true)
        {
            if(child)
            {
                tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]').prop('checked',true).addClass('undetermined');
            }
        }
        if(childno == childcheckedno)
        {
            tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]').prop('checked',true).removeClass('undetermined');
            colors_change_parent_checked(tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]'));
        }
        else if(childcheckedno == 0)
        {
            tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]').removeAttr('checked');
            colors_change_parent_unchecked(tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]'));
        }
        else
        {
            tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]').addClass('undetermined');
            colors_change_parent_checked(tthis.parents('ul').find('.ccheckbox[data-parent="'+child+'"]'));
        }
    }
    jQuery(document).on('change','.mycheckbox',function() {
        mycheckbox(jQuery(this));
    });

    jQuery(document).on('change','.mycheckbox',function() {
        var tthis = jQuery(this);
        var this_color = tthis.parents('label');
        if((tthis.prop('checked')==true))
        {
            if(this_color.hasClass('black'))
            {
                this_color.removeClass('black').addClass('green');
            }
            if(this_color.hasClass('red'))
            {
                this_color.removeClass('red').addClass('blue');
            }
        }
        else
        {
            if(this_color.hasClass('blue'))
            {
                this_color.removeClass('blue').addClass('red');
            }
            if(this_color.hasClass('green'))
            {
                this_color.removeClass('green').addClass('black');
            }
        }
        var red_size = tthis.parents('.permissions-row').find('label.red').size();
        var green_size = tthis.parents('.permissions-row').find('label.green').size();
        if((red_size>0) || (green_size>0))
        {
            jQuery('.input-customrole').val('Yes');
        }
        else
        {
            jQuery('.input-customrole').val('No');
        }
    });

    function mycheckbox_parent(tthis)
    {
        var cpatent = tthis.attr('data-parent');
        var childsize = tthis.parents('ul').find('.ccheckbox[data-child="'+cpatent+'"]').size();
        if(tthis.prop('checked')==false)
        {
            tthis.parents('ul').find('.ccheckbox[data-child="'+cpatent+'"]').removeAttr('checked').removeClass('undetermined');
            tthis.parents('ul').find('.ccheckbox[data-child="'+cpatent+'"]').each(function() {
                colors_change_parent_unchecked(jQuery(this));
            });
        }
        else
        {
            if(childsize>0)
            {
                tthis.addClass('undetermined');
            }
        }
    }
    
    jQuery(document).on('change','.mycheckbox[data-parent]',function() {
        mycheckbox_parent(jQuery(this));
    });
    
    function ccheckbox(tthis)
    {
        var liSize = tthis.parents('ul').find('li').size();
        var checkedSize = tthis.parents('ul').find('.ccheckbox:checked').size();
        tthis.parents('.box-permissions').find('.pcheckbox').prop('checked',true);//permissions-checks
        if(checkedSize == liSize)
        {
            tthis.parents('.box-permissions').find('.pcheckbox').removeClass('undetermined');
        }
        else if(checkedSize == 0)
        {
            tthis.parents('.box-permissions').find('.pcheckbox').removeAttr('checked');
        }
        else
        {
            tthis.parents('.box-permissions').find('.pcheckbox').addClass('undetermined');
        }
    }
    jQuery(document).on('change','.ccheckbox',function() {
        ccheckbox(jQuery(this));
    });

    function pcheckbox(tthis)
    {
        tthis.removeClass('undetermined');
        tthis.parents('.box-permissions').find('[data-parent]').removeClass('undetermined');
        if(tthis.prop('checked')==true)
        {
            tthis.parents('.box-permissions').find('.ccheckbox').prop('checked',true);//permissions-checks
            tthis.parents('.box-permissions').find('.ccheckbox').each(function() {
                colors_change_parent_checked(jQuery(this));
            });
        }
        else
        {
            tthis.parents('.box-permissions').find('.ccheckbox').removeAttr('checked');
            tthis.parents('.box-permissions').find('.ccheckbox').each(function() {
                colors_change_parent_unchecked(jQuery(this));
            });
        }
    }

    jQuery(document).on('change','.pcheckbox',function() {
        pcheckbox(jQuery(this));
    });

    function checkbox_wparent(tthis)
    {
        var parent = tthis.attr('data-parent');
        
        jQuery('[data-parent='+parent+']').each(function() {
            var childno = jQuery(this).parents('ul').find('.ccheckbox[data-child="'+parent+'"]').size();
            var childcheckedno = jQuery(this).parents('ul').find('.ccheckbox[data-child="'+parent+'"]:checked').size();

            if((childno == childcheckedno) && (childno>0))
            {
                jQuery(this).prop('checked',true).removeClass('undetermined');
            }
            else if(childcheckedno == 0)
            {
                if(jQuery(this).prop('checked')==true)
                {
                    jQuery(this).removeClass('undetermined');
                }
            }
            else
            {
                jQuery(this).prop('checked',true).addClass('undetermined');
            }
        });
    }

    jQuery(window).load(function() {
        jQuery('input[type=checkbox].mycheckbox').each(function() {
            checkbox_wparent(jQuery(this));
        });
        jQuery('input[type=checkbox][data-child]').each(function() {
            mycheckbox_parent(jQuery(this));
        });
        jQuery('input[type=checkbox].ccheckbox').each(function() {
            ccheckbox(jQuery(this));
        });

        var red_size = jQuery('.permissions-row').find('label.red').size();
        var green_size = jQuery('.permissions-row').find('label.green').size();
        if((red_size>0) || (green_size>0))
        {
            jQuery('.input-customrole').val('Yes');
        }
        else
        {
            jQuery('.input-customrole').val('No');
        }
    });

});