
    jQuery(function(){
        var $buttons = jQuery('.dcchub-tab-buttons > li');
        var $contents = jQuery('.dcchub-tabs-content > li');
        
        $buttons.click(function(){
            $buttons.removeClass('active');
            $contents.removeClass('active');

            jQuery(this).addClass('active');
            var _target = jQuery(this).data('tab');
            jQuery(_target).addClass('active');

            return false;
        });

    })
    
