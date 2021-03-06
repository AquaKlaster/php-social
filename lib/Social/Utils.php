<?php

namespace Social;

class Utils
{

    public static function execPost($url, array $data = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $buffer = curl_exec($ch);

        if ($buffer === false) {
            $error = curl_error($ch);
            curl_close($ch);

            return json_encode(array('error' => sprintf('Curl error "%s"', $error)));
        }

        curl_close($ch);

        return $buffer;
    }

    public static function execGet($url, array $data = array())
    {
        if (count($data)) {
            $url .= '?' . http_build_query($data);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $buffer = curl_exec($ch);

        if ($buffer === false) {
            $error = curl_error($ch);
            curl_close($ch);

            return json_encode(array('error' => sprintf('Curl error "%s"', $error)));
        }

        curl_close($ch);

        return $buffer;
    }


}