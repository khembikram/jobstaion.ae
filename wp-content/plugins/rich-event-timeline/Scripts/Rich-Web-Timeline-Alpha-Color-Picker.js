jQuery(document).ready(function ($) {

    Color.prototype.toString = function (flag) {
        if ('no-alpha' == flag) {
            return this.toCSS('rgba', '1').replace(/\s+/g, '');
        }
        if (1 > this._alpha) {
            return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
        }
        var hex = parseInt(this._color, 10).toString(16);
        if (this.error) {
            return '';
        }
        if (hex.length < 6) {
            for (var i = 6 - hex.length - 1; i >= 0; i--) {
                hex = '0' + hex;
            }
        }
        return '#' + hex;
    };

    function acp_get_alpha_value_from_color(value) {
        var alphaVal;
        value = value.replace(/ /g, '');
        if (value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
            alphaVal = parseFloat(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]).toFixed(2) * 100;
            alphaVal = parseInt(alphaVal);
        } else {
            alphaVal = 100;
        }
        return alphaVal;
    }

    function acp_update_alpha_value_on_color_input(alpha, $input, $alphaSlider, update_slider) {
        var iris, colorPicker, color;
        iris = $input.data('a8cIris');
        colorPicker = $input.data('wpWpColorPicker');
        iris._color._alpha = alpha;
        color = iris._color.toString();
        $input.val(color);
        colorPicker.toggler.css({
            'background-color': color
        });
        if (update_slider) {
            acp_update_alpha_value_on_alpha_slider(alpha, $alphaSlider);
        }
        $input.wpColorPicker('color', color);
    }

    function acp_update_alpha_value_on_alpha_slider(alpha, $alphaSlider) {
        $alphaSlider.slider('value', alpha);
        $alphaSlider.find('.ui-slider-handle').text(alpha.toString());
    }

    $.fn.alphaColorPicker = function () {
        return this.each(function () {
            var $input, startingColor, paletteInput, showOpacity, defaultColor, palette,
                colorPickerOptions, $container, $alphaSlider, alphaVal, sliderOptions;
            $input = $(this);
            $input.wrap('<div class="alpha-color-picker-wrap" style="width: ; margin-top: 3px;"></div>');
            paletteInput = $input.attr('data-palette') || 'true';
            showOpacity = $input.attr('data-show-opacity') || 'true';
            defaultColor = $input.attr('data-default-color') || '';
            if (paletteInput.indexOf('|') !== -1) {
                palette = paletteInput.split('|');
            } else if ('false' == paletteInput) {
                palette = false;
            } else {
                palette = true;
            }
            startingColor = $input.val().replace(/\s+/g, '');
            if ('' == startingColor) {
                startingColor = defaultColor;
            }
            colorPickerOptions = {
                change: function (event, ui) {
                    var key, value, alpha, $transparency;
                    key = $input.attr('data-customize-setting-link');
                    value = $input.wpColorPicker('color');
                    if (defaultColor == value) {
                        alpha = acp_get_alpha_value_from_color(value);
                        $alphaSlider.find('.ui-slider-handle').text(alpha);
                    }
                    if (typeof wp.customize != 'undefined') {
                        wp.customize(key, function (obj) {
                            obj.set(value);
                        });
                    }
                    $transparency = $container.find('.transparency');
                    $transparency.css('background-color', ui.color.toString('no-alpha'));
                },
                palettes: palette
            };
            $input.wpColorPicker(colorPickerOptions);
            $container = $input.parents('.wp-picker-container:first');
            $('<div class="alpha-color-picker-container">' +
                '<div class="min-click-zone click-zone"></div>' +
                '<div class="max-click-zone click-zone"></div>' +
                '<div class="alpha-slider"></div>' +
                '<div class="transparency"></div>' +
                '</div>').appendTo($container.find('.wp-picker-holder'));
            $alphaSlider = $container.find('.alpha-slider');
            alphaVal = acp_get_alpha_value_from_color(startingColor);
            sliderOptions = {
                create: function (event, ui) {
                    var value = $(this).slider('value');
                    $(this).find('.ui-slider-handle').text(value);
                    $(this).siblings('.transparency ').css('background-color', startingColor);
                },
                value: alphaVal,
                range: 'max',
                step: 1,
                min: 0,
                max: 100,
                animate: 300
            };
            $alphaSlider.slider(sliderOptions);
            if ('true' == showOpacity) {
                $alphaSlider.find('.ui-slider-handle').addClass('show-opacity');
            }
            $container.find('.min-click-zone').on('click', function () {
                acp_update_alpha_value_on_color_input(0, $input, $alphaSlider, true);
            });
            $container.find('.max-click-zone').on('click', function () {
                acp_update_alpha_value_on_color_input(100, $input, $alphaSlider, true);
            });
            $container.find('.iris-palette').on('click', function () {
                var color, alpha;
                color = $(this).css('background-color');
                alpha = acp_get_alpha_value_from_color(color);
                acp_update_alpha_value_on_alpha_slider(alpha, $alphaSlider);
                if (alpha != 100) {
                    color = color.replace(/[^,]+(?=\))/, (alpha / 100).toFixed(2));
                }
                $input.wpColorPicker('color', color);
            });
            $container.find('.button.wp-picker-default').on('click', function () {
                var alpha = acp_get_alpha_value_from_color(defaultColor);
                acp_update_alpha_value_on_alpha_slider(alpha, $alphaSlider);
            });
            $input.on('input', function () {
                var value = $(this).val();
                var alpha = acp_get_alpha_value_from_color(value);
                acp_update_alpha_value_on_alpha_slider(alpha, $alphaSlider);
            });
            $alphaSlider.slider().on('slide', function (event, ui) {
                var alpha = parseFloat(ui.value) / 100.0;
                acp_update_alpha_value_on_color_input(alpha, $input, $alphaSlider, false);
                $(this).find('.ui-slider-handle').text(ui.value);
            });
        });
    }

});