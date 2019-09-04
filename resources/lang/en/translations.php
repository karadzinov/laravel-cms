<?php 

return [
  'translations'    => 'Translations',
  'create-new'      => 'Create translation',
  'edit'            => 'Edit translation',
  'total'           => 'translations total',
  'delete'          => 'Delete translation',
  'confirm-delete'  => 'Are you sure you want to delete this translation?',
  'back-to'         => 'Back To Translations',
  'save'            => 'Save translation',
  'update'          => 'Update translation',
  'success'         => [
        'created' => 'Translation Successfully Created.',
        'updated' => 'Translation Successfully Updated.',
        'deleted' => 'Translation Successfully Deleted.',
    ],
  'error'         => 'We are experiencing some issues, please try again later.',
  
  'created-message' => 'Now that you created files for your new language, you should translate your website on this new language. If you do not translate it, content will be shown in english and language will not take effect. You will be redirected to the page. You can stop and countinue whenever you want.',
  
  'choose-language' => 'Choose Language',
  'explication'     => 
    '
    <div class="translations-explication">
      <p>
        To update translations for this language, you should choose the file name from the right sidebar and update all of its fields. By default, all translations are in english. While translating this kind of text, you should be carefull about few things:
        </p>
        <ul>
          <li>
            All files should be saved separately, every file has its own "save button"
          </li>
          <li>
            Our "main" file is <code>general</code>. All of its translations are only for the user\'s interface. So this one should be translated first. 
              Other files that could be found on the user\'s interface are:
              <code>validation</code>, <code>auth</code>, <code>passwords</code>, <code>register</code> and <code>socials</code>.
              All other files are made for admin menu, so if you understand it, you do not have to translate other files.
          </li>
          <li>Files\' names can not be changed.</li>
          <li>
            You can stop and continue another time, but be careful if your language is activated in Settings (available to users). Be carefull also when changing files in the right sidebar, because while changing files changes that you made will be deleted.
          </li>
          <li>
            If you find words starting with ":" (ex. :name, :title), leave them as they are, they are dynamic.
          </li>
          <li>
            If you find parts of translation starting with <code><_span class="exemple-class" id="just-an-exemple-id">This is just an exemple<_/span></code> change only the part between span tags, so in this case "This is just an exemple" is changable.
          </li>
          <li>
            If you find letters with no sense to you (ex. <code>"&_laquo";</code>) leave it as it is, those are specials characters written for your machine. This character, for exemple is &laquo;
          </li>
          <li>
            Be persistant, we repeat that if you leave files untranslated, those parts of text will be shown in english.
          </li>
        </ul>
    </div>
  ',
  'how-to'                  => 'How To Translate',
  'missing-enabled-language' => 'You have :count languages without translation files. Please make them on translation page.',
  'drag-and-drop' => 'Drag slides from top to nottom so that they reflect your desired order',
  'change-order'  => 'Change Order',

];