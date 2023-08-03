<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Modules\AddonsManager\Entities\Language;

if(!function_exists('translate'))
{
    function translate($key)
    {
        $local = default_lang();
        App::setLocale($local);

        try {
            $lang_array = include(base_path('resources/lang/' . $local . '/messages.php'));
            $processed_key = ucfirst(str_replace('_', ' ', remove_invalid_charcaters(str_replace("\'", "'", $key))));
            $key = remove_invalid_charcaters($key);

            if (!array_key_exists($key, $lang_array)) {
                $lang_array[$key] = $processed_key;

                ksort($lang_array);
                // Build the PHP file contents
                $file_contents = "<?php\n\nreturn [\n";
                foreach ($lang_array as $key => $value) {
                    $file_contents .= "\t\"" . $key . "\" => \"" . $value . "\",\n";
                }
                $file_contents .= "];\n";

                file_put_contents(base_path('resources/lang/' . $local . '/messages.php'), $file_contents);
                $result = $processed_key;
            } else {
                $result = __('messages.' . $key);
            }
        } catch (\Exception $exception) {
            $result = __('messages.' . $key);
        }
        return $result;
    }
}

function remove_invalid_charcaters($str)
{
    return str_ireplace(['"', ';', '<', '>', '?'], ' ', preg_replace('/\s\s+/', ' ', $str));
}

function default_lang()
{
    // $lang = App::getLocale();
    if (Session::has('local_lang')) {
        $lang = Session::get('local_lang');
        $direction = Session::get('direction');
    } else {
        if (!Schema::hasTable('languages')) {
            $language = Language::where(['default'=>1])->first();
        }else{
            $language = "en";
        }

        $lang = $language->lang_code ?? 'en';
        $direction = $language->direction ?? 'ltr';
        Session::put('local_lang', $lang);
        Session::put('direction', $direction);
    }
    return $lang;
}
