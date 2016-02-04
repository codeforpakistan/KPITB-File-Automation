(function( $ )
{
    var $this;

    $.fn.wysiwygEditor = function( options )
    {
        $this        = $(this);
        var settings = $.extend( {}, $.fn.wysiwygEditor.defaults, options );

        $.fn.wysiwygEditor.drawToolbar( $this, $(settings.editor), settings );
    };

    /**
     * Defaults
     *
     * @type {Object}
     */
    $.fn.wysiwygEditor.defaults = {
        previewArea: '#editor_preview',
        editor: '#editor',
        toolbarArea: 'toolbar' // Must be id
    };

    /**
     * Drawing toolbar
     *
     * @param editor
     * @param settings
     */
    $.fn.wysiwygEditor.drawToolbar = function( editor, editorArea, settings )
    {
        var toolbarArea = $('<div id="' + settings.toolbarArea + '"></div>');

        $.each($.fn.wysiwygEditor.toolbar, function( index, group )
        {
            var groupArea;

            if ( 'checkbox' == group.type )
            {
                groupArea = $('<div class="btn-group place-holder" data-toggle="buttons-checkbox" style="float: left; margin: 5px 5px 0 0;"></div>');
            }
            else if ( 'dropdown' == group.type )
            {
                groupArea = $(
                    '<div class="btn-group" style="float: left; margin: 5px 5px 0 0;">' +
                      '<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" title="' + group.title + '">' +
                        '<i class="' + group.icon + '"></i>&nbsp;<span class="caret"></span>' +
                      '</a>' +
                      '<ul class="dropdown-menu place-holder">' +
                      '</ul>' +
                    '</div>'
                );
            }

            $.each(group.buttons, function( key, button )
            {
                var buttonObj;

                if ( 'input' == button.type )
                {
                    buttonObj = $('<input type="button" class="btn btn-primary" data-toggle="button" />');
                    buttonObj.addClass( button.class );
                    buttonObj.attr( 'value', button.value );
                    buttonObj.attr( 'title', button.title );

                    if ( typeof button.style !== 'undefined' )
                    {
                        buttonObj.attr( 'style', button.style );
                    }
                }
                else if ( 'a' == button.type )
                {
                    if ( 'dropdown' == group.type )
                    {
                        buttonObj = $('<li><a href="#" class="' + button.class + '">' + button.value + '</a></li>');
                    }
                    else
                    {
                        buttonObj = $('<a class="btn btn-primary" data-toggle="button" href="#"></a>');
                        buttonObj.addClass( button.class );
                        buttonObj.attr( 'title', button.title );

                        if ( typeof button.icon !== 'undefined' )
                        {
                            buttonObj.append( '<i class="' + button.icon + '"></i>' );
                        }
                    }
                }

                if ( typeof buttonObj !== 'undefined' )
                {
                    if ( 'dropdown' == group.type )
                    {
                        buttonObj.appendTo( groupArea.find('.place-holder:first') );
                    }
                    else
                    {
                        buttonObj.appendTo( groupArea );
                    }
                }
            });

            toolbarArea.append(groupArea);
        });

        toolbarArea = $('<div></div>').append(toolbarArea);
        editor.before( toolbarArea.html() + '<br style="clear: both;" /><hr />' );
        $('#' + settings.toolbarArea).hide();

        // $.each($.fn.wysiwygEditor.toolbar, function( index, group )
        // {
        //     $.each(group.buttons, function( key, button )
        //     {
        //         $('.' + button.class ).live('click', function()
        //         {
        //             button.callback( editorArea, settings );
        //         });
        //     });
        // });

        $('#' + settings.toolbarArea).show();
    };

    // Buttons used by the editor
    $.fn.wysiwygEditor.toolbar =
    {
        group1:
        {
            type: 'checkbox',
            buttons:
                [
                    {
                        type: 'input',
                        class: 'h1-id',
                        value: 'H1',
                        title: 'Heading 1',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<h1>', '</h1>', 'Level 1 Heading' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'h2-id',
                        value: 'H2',
                        title: 'Heading 2',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<h2>', '</h2>', 'Level 2 Heading' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'h3-id',
                        value: 'H3',
                        title: 'Heading 3',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<h3>', '</h3>', 'Level 3 Heading' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'h4-id',
                        value: 'H4',
                        title: 'Heading 4',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<h4>', '</h4>', 'Level 4 Heading' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'h5-id',
                        value: 'H5',
                        title: 'Heading 5',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<h5>', '</h5>', 'Level 5 Heading' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'h6-id',
                        value: 'H6',
                        title: 'Heading 6',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<h6>', '</h6>', 'Level 6 Heading' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'p-id',
                        value: '¶',
                        title: 'Paragraph',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<p>', '</p>', 'Paragraph' )
                        }
                    }
                ]
        },
        group2:
        {
            type: 'checkbox',
            buttons:
                [
                    {
                        type: 'input',
                        class: 'b-id',
                        value: 'B',
                        title: 'Bold',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<strong>', '</strong>', 'Bold text' )
                        }
                    },
                    {
                        type: 'input',
                        class: 'i-id',
                        value: 'I',
                        title: 'Italic',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<span style="font-style: italic;">', '</span>', 'Italic text' )
                        }
                    },
                    {
                        type: 'input',
                        class: 's-id',
                        value: 'S',
                        title: 'Strike out text',
                        style: 'text-decoration: line-through;',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<span style="text-decoration: line-through;">', '</span>', 'Strike out text' )
                        }
                    }
                ]
        },
        group3:
        {
            type: 'dropdown',
            icon: 'icon-list icon-white',
            title: 'List',
            buttons:
                [
                    {
                        type: 'a',
                        class: 'ul-id',
                        value: 'UL',
                        title: '',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<ul>', '</ul>', '' );
                        }
                    },
                    {
                        type: 'a',
                        class: 'ol-id',
                        value: 'OL',
                        title: '',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<ol>', '</ol>', '' );
                        }
                    },
                    {
                        type: 'a',
                        class: 'li-id',
                        value: 'LI',
                        title: '',
                        callback: function( editor )
                        {
                            wrapContent( editor, '<li>', '</li>', 'List element' );
                        }
                    }
                ]
        },
        group4:
        {
            type: 'checkbox',
            buttons:
                [
                    {
                        type: 'a',
                        class: 'picture-id',
                        icon: 'icon-picture icon-white',
                        title: 'Picture',
                        callback: function( editor )
                        {
                            var src = prompt( 'Source', 'http://' );
                            var alt = null;

                            if ( null !== src )
                            {
                                alt = prompt( 'Alternative text', '' );
                            }

                            if ( null === alt )
                            {
                                return false;
                            }

                            wrapContent( editor, '<img src="' + src + '" alt="' + alt + '">', '', '' );
                        }
                    },
                    {
                        type: 'a',
                        class: 'link-id',
                        icon: 'icon-random icon-white',
                        title: 'Link',
                        callback: function( editor )
                        {
                            var href = prompt( 'Link', 'http://' );

                            if ( null === href )
                            {
                                return false;
                            }

                            wrapContent( editor, '<a href="' + href + '">', '</a>', 'Your text to link...' );
                        }
                    }
                ]
        },
        group5:
        {
            type: 'checkbox',
            buttons:
                [
                    {
                        type: 'input',
                        class: 'clear-id',
                        value: ' < > ',
                        title: 'Clear',
                        style: 'text-decoration: line-through;',
                        callback: function( editor )
                        {
                            clear( editor );
                        }
                    },
                    {
                        type: 'a',
                        class: 'preview-id',
                        icon: 'icon-ok icon-white',
                        title: 'Preview',
                        callback: function( editor, settings )
                        {
                            $(settings.previewArea).find('.modal-body:first').html( $.trim( editor.val() ) );
                            $(settings.previewArea).modal('show');
                        }
                    }
                ]
        }
    };

    /**
     * @param editor
     * @param tagOpen
     * @param tagClose
     * @param defaultText
     */
    function wrapContent( editor, tagOpen, tagClose, defaultText )
    {
        var selection      = '';
        var selectionStart = 0;
        var selectionEnd   = 0;
        var editorValue    = $.trim( editor.val() );

        if ( '' != editorValue )
        {
            selectionStart = editor[0].selectionStart;
            selectionEnd   = editor[0].selectionEnd;

            if ( selectionStart < selectionEnd )
            {
                selection = editorValue.substring( selectionStart, selectionEnd );
            }
        }

        if ( '' != selection )
        {
            editor.val( editorValue.substring( 0, selectionStart ) + tagOpen + selection + tagClose + editorValue.substring( selectionEnd, editorValue.length ) );
        }
        else
        {
            var caret = getCaret( editor[0] );

            editor.val( editorValue.substring( 0, caret ) + tagOpen + defaultText + tagClose + editorValue.substring( caret, editorValue.length ) );
        }
    }

    /**
     * Get current caret position
     *
     * @param el
     * @return {Number}
     */
    function getCaret( el )
    {
        if ( el.selectionStart )
        {
            return el.selectionStart;
        }
        else if ( document.selection )
        {
            el.focus();

            var r = document.selection.createRange();

            if ( r == null )
            {
                return 0;
            }

            var re = el.createTextRange(),
                rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);

            return rc.text.length;
        }

        return 0;
    }

    /**
     * Clear all tags from editor space
     *
     * @param editor
     */
    function clear( editor )
    {
        editor.val( editor.val().replace( /<(.*?)>/g, '' ) );
    }
})(jQuery);

$(function()
{
 $('#wysiwygEditor').wysiwygEditor();
});