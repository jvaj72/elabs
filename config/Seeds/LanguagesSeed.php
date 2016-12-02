<?php

use Migrations\AbstractSeed;

/**
 * Languages seed.
 */
class LanguagesSeed extends AbstractSeed
{

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 'aar', 'iso639_1' => 'aa', 'name' => 'Afaraf', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'abk', 'iso639_1' => 'ab', 'name' => 'Аҧсуа', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'afr', 'iso639_1' => 'af', 'name' => 'Afrikaans', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'aka', 'iso639_1' => 'ak', 'name' => 'Akan', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'amh', 'iso639_1' => 'am', 'name' => 'አማርኛ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ara', 'iso639_1' => 'ar', 'name' => '‫العربية', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'arg', 'iso639_1' => 'an', 'name' => 'Aragonés', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'asm', 'iso639_1' => 'as', 'name' => 'অসমীয়া', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ava', 'iso639_1' => 'av', 'name' => 'авар мацӀ ; магӀарул мацӀ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ave', 'iso639_1' => 'ae', 'name' => 'Avesta', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'aym', 'iso639_1' => 'ay', 'name' => 'Aymar aru', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'aze', 'iso639_1' => 'az', 'name' => 'Azərbaycan dili', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bak', 'iso639_1' => 'ba', 'name' => 'башҡорт теле', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bam', 'iso639_1' => 'bm', 'name' => 'Bamanankan', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bel', 'iso639_1' => 'be', 'name' => 'Беларуская', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ben', 'iso639_1' => 'bn', 'name' => 'বাংলা', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bih', 'iso639_1' => 'bh', 'name' => 'भोजपुरी', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bis', 'iso639_1' => 'bi', 'name' => 'Bislama', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bod', 'iso639_1' => 'bo', 'name' => 'བོད་ཡིག', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bos', 'iso639_1' => 'bs', 'name' => 'Bosanski jezik', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bre', 'iso639_1' => 'br', 'name' => 'Brezhoneg', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'bul', 'iso639_1' => 'bg', 'name' => 'български език', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cat', 'iso639_1' => 'ca', 'name' => 'Català', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cha', 'iso639_1' => 'ch', 'name' => 'Chamoru', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'che', 'iso639_1' => 'ce', 'name' => 'нохчийн мотт', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'chu', 'iso639_1' => 'cu', 'name' => 'Словѣньскъ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'chv', 'iso639_1' => 'cv', 'name' => 'чӑваш чӗлхи', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cor', 'iso639_1' => 'kw', 'name' => 'Kernewek', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cos', 'iso639_1' => 'co', 'name' => 'Corsu', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cre', 'iso639_1' => 'cr', 'name' => 'ᓀᐦᐃᔭᐍᐏᐣ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cym', 'iso639_1' => 'cy', 'name' => 'Cymraeg', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'cze', 'iso639_1' => 'cs', 'name' => 'Česky ; čeština', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'dan', 'iso639_1' => 'da', 'name' => 'Dansk', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'div', 'iso639_1' => 'dv', 'name' => '‫ދިވެހި', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'dzo', 'iso639_1' => 'dz', 'name' => 'རྫོང་ཁ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ell', 'iso639_1' => 'el', 'name' => 'Ελληνικά', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'eng', 'iso639_1' => 'en', 'name' => 'English', 'has_site_translation' => 1, 'translation_folder' => ''],
            ['id' => 'epo', 'iso639_1' => 'eo', 'name' => 'Esperanto', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'est', 'iso639_1' => 'et', 'name' => 'Eesti keel', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'eus', 'iso639_1' => 'eu', 'name' => 'Euskara', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ewe', 'iso639_1' => 'ee', 'name' => 'Ɛʋɛgbɛ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'fao', 'iso639_1' => 'fo', 'name' => 'Føroyskt', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'fas', 'iso639_1' => 'fa', 'name' => '‫فارسی', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'fij', 'iso639_1' => 'fj', 'name' => 'Vosa Vakaviti', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'fin', 'iso639_1' => 'fi', 'name' => 'Suomen kieli', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'fra', 'iso639_1' => 'fr', 'name' => 'Français', 'has_site_translation' => 1, 'translation_folder' => 'fr_FR'],
            ['id' => 'fry', 'iso639_1' => 'fy', 'name' => 'Frysk', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ful', 'iso639_1' => 'ff', 'name' => 'Fulfulde', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ger', 'iso639_1' => 'de', 'name' => 'Deutsch', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'gla', 'iso639_1' => 'gd', 'name' => 'Gàidhlig', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'gle', 'iso639_1' => 'ga', 'name' => 'Gaeilge', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'glg', 'iso639_1' => 'gl', 'name' => 'Galego', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'glv', 'iso639_1' => 'gv', 'name' => 'Ghaelg', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'grn', 'iso639_1' => 'gn', 'name' => 'Avañe\'ẽ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'guj', 'iso639_1' => 'gu', 'name' => 'ગુજરાતી', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hat', 'iso639_1' => 'ht', 'name' => 'Kreyòl ayisyen', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hau', 'iso639_1' => 'ha', 'name' => '‫هَوُسَ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'heb', 'iso639_1' => 'he', 'name' => '‫עברית', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'her', 'iso639_1' => 'hz', 'name' => 'Otjiherero', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hin', 'iso639_1' => 'hi', 'name' => 'हिन्दी ; हिंदी', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hmo', 'iso639_1' => 'ho', 'name' => 'Hiri Motu', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hrv', 'iso639_1' => 'hr', 'name' => 'Hrvatski', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hun', 'iso639_1' => 'hu', 'name' => 'magyar', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'hye', 'iso639_1' => 'hy', 'name' => 'Հայերեն', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ibo', 'iso639_1' => 'ig', 'name' => 'Igbo', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ido', 'iso639_1' => 'io', 'name' => 'Ido', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'iii', 'iso639_1' => 'ii', 'name' => 'ꆇꉙ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'iku', 'iso639_1' => 'iu', 'name' => 'ᐃᓄᒃᑎᑐᑦ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ile', 'iso639_1' => 'ie', 'name' => 'Interlingue', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ina', 'iso639_1' => 'ia', 'name' => 'Interlingua', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ind', 'iso639_1' => 'id', 'name' => 'Bahasa Indonesia', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ipk', 'iso639_1' => 'ik', 'name' => 'Iñupiaq ; Iñupiatun', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'isl', 'iso639_1' => 'is', 'name' => 'Íslenska', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ita', 'iso639_1' => 'it', 'name' => 'Italiano', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'jav', 'iso639_1' => 'jv', 'name' => 'Basa Jawa', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'jpn', 'iso639_1' => 'ja', 'name' => '日本語 (にほんご)', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kal', 'iso639_1' => 'kl', 'name' => 'Kalaallisut ; kalaallit oqaasii', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kan', 'iso639_1' => 'kn', 'name' => 'ಕನ್ನಡ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kas', 'iso639_1' => 'ks', 'name' => 'कश्मीरी ; كشميري', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kat', 'iso639_1' => 'ka', 'name' => 'ქართული', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kau', 'iso639_1' => 'kr', 'name' => 'Kanuri', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kaz', 'iso639_1' => 'kk', 'name' => 'Қазақ тілі', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'khm', 'iso639_1' => 'km', 'name' => 'ភាសាខ្មែរ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kik', 'iso639_1' => 'ki', 'name' => 'Gĩkũyũ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kin', 'iso639_1' => 'rw', 'name' => 'Kinyarwanda', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kir', 'iso639_1' => 'ky', 'name' => 'кыргыз тили', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kom', 'iso639_1' => 'kv', 'name' => 'коми кыв', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kon', 'iso639_1' => 'kg', 'name' => 'KiKongo', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kor', 'iso639_1' => 'ko', 'name' => '한국어 (韓國語) ; 조선말 (朝鮮語)', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kua', 'iso639_1' => 'kj', 'name' => 'Kuanyama', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'kur', 'iso639_1' => 'ku', 'name' => 'Kurdî ; كوردی', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lao', 'iso639_1' => 'lo', 'name' => 'ພາສາລາວ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lat', 'iso639_1' => 'la', 'name' => 'Latine ; lingua latina', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lav', 'iso639_1' => 'lv', 'name' => 'Latviešu valoda', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lim', 'iso639_1' => 'li', 'name' => 'Limburgs', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lin', 'iso639_1' => 'ln', 'name' => 'Lingála', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lit', 'iso639_1' => 'lt', 'name' => 'Lietuvių kalba', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ltz', 'iso639_1' => 'lb', 'name' => 'Lëtzebuergesch', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lub', 'iso639_1' => 'lu', 'name' => 'kiluba', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'lug', 'iso639_1' => 'lg', 'name' => 'Luganda', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mah', 'iso639_1' => 'mh', 'name' => 'Kajin M̧ajeļ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mal', 'iso639_1' => 'ml', 'name' => 'മലയാളം', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mar', 'iso639_1' => 'mr', 'name' => 'मराठी', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mkd', 'iso639_1' => 'mk', 'name' => 'македонски јазик', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mlg', 'iso639_1' => 'mg', 'name' => 'Fiteny malagasy', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mlt', 'iso639_1' => 'mt', 'name' => 'Malti', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mol', 'iso639_1' => 'mo', 'name' => 'лимба молдовеняскэ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mon', 'iso639_1' => 'mn', 'name' => 'Монгол', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mri', 'iso639_1' => 'mi', 'name' => 'Te reo Māori', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'msa', 'iso639_1' => 'ms', 'name' => 'Bahasa Melayu ; بهاس ملايو', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'mya', 'iso639_1' => 'my', 'name' => 'ဗမာစာ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nau', 'iso639_1' => 'na', 'name' => 'Ekakairũ Naoero', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nav', 'iso639_1' => 'nv', 'name' => 'Diné bizaad ; Dinékʼehǰí', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nbl', 'iso639_1' => 'nr', 'name' => 'Ndébélé', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nde', 'iso639_1' => 'nd', 'name' => 'isiNdebele', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ndo', 'iso639_1' => 'ng', 'name' => 'Owambo', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nep', 'iso639_1' => 'ne', 'name' => 'नेपाली', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nld', 'iso639_1' => 'nl', 'name' => 'Nederlands', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nno', 'iso639_1' => 'nn', 'name' => 'Norsk nynorsk', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nob', 'iso639_1' => 'nb', 'name' => 'Norsk bokmål', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nor', 'iso639_1' => 'no', 'name' => 'Norsk', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'nya', 'iso639_1' => 'ny', 'name' => 'ChiCheŵa ; chinyanja', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'oci', 'iso639_1' => 'oc', 'name' => 'Occitan', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'oji', 'iso639_1' => 'oj', 'name' => 'ᐊᓂᔑᓈᐯᒧᐎᓐ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ori', 'iso639_1' => 'or', 'name' => 'ଓଡ଼ିଆ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'orm', 'iso639_1' => 'om', 'name' => 'Afaan Oromoo', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'oss', 'iso639_1' => 'os', 'name' => 'Ирон æвзаг', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'pan', 'iso639_1' => 'pa', 'name' => 'ਪੰਜਾਬੀ ; پنجابی', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'pli', 'iso639_1' => 'pi', 'name' => 'पािऴ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'pol', 'iso639_1' => 'pl', 'name' => 'Polski', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'por', 'iso639_1' => 'pt', 'name' => 'Português', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'pus', 'iso639_1' => 'ps', 'name' => '‫پښتو', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'que', 'iso639_1' => 'qu', 'name' => 'Runa Simi ; Kichwa', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'rcf', 'iso639_1' => 'rc', 'name' => 'Kréol Rénioné', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'roh', 'iso639_1' => 'rm', 'name' => 'Rumantsch grischun', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ron', 'iso639_1' => 'ro', 'name' => 'Română', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'run', 'iso639_1' => 'rn', 'name' => 'kiRundi', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'rus', 'iso639_1' => 'ru', 'name' => 'русский язык', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sag', 'iso639_1' => 'sg', 'name' => 'Yângâ tî sängö', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'san', 'iso639_1' => 'sa', 'name' => 'संस्कृतम्', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sin', 'iso639_1' => 'si', 'name' => 'සිංහල', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'slk', 'iso639_1' => 'sk', 'name' => 'Slovenčina', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'slv', 'iso639_1' => 'sl', 'name' => 'Slovenščina', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sme', 'iso639_1' => 'se', 'name' => 'Davvisámegiella', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'smo', 'iso639_1' => 'sm', 'name' => 'Gagana fa\'a Samoa', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sna', 'iso639_1' => 'sn', 'name' => 'chiShona', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'snd', 'iso639_1' => 'sd', 'name' => 'सिन्धी ; ‫سنڌي، سندھی', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'som', 'iso639_1' => 'so', 'name' => 'Soomaaliga ; af Soomaali', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sot', 'iso639_1' => 'st', 'name' => 'seSotho', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'spa', 'iso639_1' => 'es', 'name' => 'Español; castellano', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sqi', 'iso639_1' => 'sq', 'name' => 'Shqip', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'srd', 'iso639_1' => 'sc', 'name' => 'sardu', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'srp', 'iso639_1' => 'sr', 'name' => 'српски језик', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ssw', 'iso639_1' => 'ss', 'name' => 'SiSwati', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'sun', 'iso639_1' => 'su', 'name' => 'Basa Sunda', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'swa', 'iso639_1' => 'sw', 'name' => 'Kiswahili', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'swe', 'iso639_1' => 'sv', 'name' => 'Svenska', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tah', 'iso639_1' => 'ty', 'name' => 'Reo Mā`ohi', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tam', 'iso639_1' => 'ta', 'name' => 'தமிழ்', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tat', 'iso639_1' => 'tt', 'name' => 'татарча ; tatarça ; ‫تاتارچا', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tel', 'iso639_1' => 'te', 'name' => 'తెలుగు', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tgk', 'iso639_1' => 'tg', 'name' => 'тоҷикӣ ; toğikī ; ‫تاجیکی', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tgl', 'iso639_1' => 'tl', 'name' => 'Tagalog', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tha', 'iso639_1' => 'th', 'name' => 'ไทย', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tir', 'iso639_1' => 'ti', 'name' => 'ትግርኛ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ton', 'iso639_1' => 'to', 'name' => 'faka Tonga', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tsn', 'iso639_1' => 'tn', 'name' => 'seTswana', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tso', 'iso639_1' => 'ts', 'name' => 'xiTsonga', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tuk', 'iso639_1' => 'tk', 'name' => 'Türkmen ; Түркмен', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'tur', 'iso639_1' => 'tr', 'name' => 'Türkçe', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'twi', 'iso639_1' => 'tw', 'name' => 'Twi', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'uig', 'iso639_1' => 'ug', 'name' => 'Uyƣurqə ; ‫ئۇيغۇرچ', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ukr', 'iso639_1' => 'uk', 'name' => 'українська мова', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'urd', 'iso639_1' => 'ur', 'name' => '‫اردو', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'uzb', 'iso639_1' => 'uz', 'name' => 'O\'zbek ; Ўзбек ; أۇزبېك', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'ven', 'iso639_1' => 've', 'name' => 'tshiVenḓa', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'vie', 'iso639_1' => 'vi', 'name' => 'Tiếng Việt', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'vol', 'iso639_1' => 'vo', 'name' => 'Volapük', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'wln', 'iso639_1' => 'wa', 'name' => 'Walon', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'wol', 'iso639_1' => 'wo', 'name' => 'Wollof', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'xho', 'iso639_1' => 'xh', 'name' => 'isiXhosa', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'yid', 'iso639_1' => 'yi', 'name' => '‫ייִדיש', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'yor', 'iso639_1' => 'yo', 'name' => 'Yorùbá', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'zha', 'iso639_1' => 'za', 'name' => 'Saɯ cueŋƅ ; Saw cuengh', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'zho', 'iso639_1' => 'zh', 'name' => '中文, 汉语, 漢語', 'has_site_translation' => 0, 'translation_folder' => null],
            ['id' => 'zul', 'iso639_1' => 'zu', 'name' => 'isiZulu', 'has_site_translation' => 0, 'translation_folder' => null],
        ];

        $table = $this->table('languages');
        $table->insert($data)->save();
    }
}
