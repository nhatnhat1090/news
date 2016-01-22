<?php
/**
 *
 * full preset returns the full toolbar configuration set for CKEditor.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
return [
    'height' => 300,
    'language' => 'en',
    'toolbarGroups' => [
        ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
        ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
        ['name' => 'editing', 'groups' => [ 'find', 'selection', 'spellchecker']],
        ['name' => 'basicstyles', 'groups' => ['basicstyles', 'colors','cleanup']],
        ['name' => 'links'],
        //['name' => 'forms'],
        '/',
        ['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align']],
        
        ['name' => 'insert'],
        ['name' => 'styles'],
        ['name' => 'blocks'],
        ['name' => 'colors'],
        ['name' => 'tools'],
        ['name' => 'others'],
        ['name' =>  'Youtube']
    ],
    'removeButtons' => 'CreateDiv,Flash,Iframe,ShowBlocks,PageBreak'
];
