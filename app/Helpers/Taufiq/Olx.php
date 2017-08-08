<?php

namespace App\Helpers\Taufiq;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
class Olx {

    public static function oauth($grant_type, $email = null, $password = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/oauth/token/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

        curl_setopt($ch, CURLOPT_POST, TRUE);

        if($grant_type == 'password')
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=password&client_id='.\Config::get('ajakteman.client_id').'&client_secret='.\Config::get('ajakteman.client_secret').'&username='.$email.'&password='.$password.'');

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Accept: application/json",
                "Content-Type: application/x-www-form-urlencoded"
            ));
        }
        if($grant_type == 'partner')
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=partner&partner_code='.\Config::get('ajakteman.partner_code').'&partner_secret='.\Config::get('ajakteman.partner_secret').'&client_id='.\Config::get('ajakteman.client_id').'&client_secret='.\Config::get('ajakteman.client_secret').'');

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Accept: application/json",
                "Content-Type: application/x-www-form-urlencoded"
            ));
        }

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response);

        if($httpcode == 200)
        {
            return response()->json([
                'st' => 'success',
                'msg' => $res
            ]);
        }

        return response()->json([
            'st' => 'failed',
            'msg' => $res
        ]);
    }

    public static function profile($access_token)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/account/profile/?access_token='.$access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Accept: application/json"
        ));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response, true);

        if($httpcode == 200)
        {
            return $res;
        }

        return false;
    }

    public static function register($email, $password, $password_confirm, $access_token)
    {
        $post['email'] = $email;
        $post['password'] = $password;
        $post['password_confirm'] = $password_confirm;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/ajakteman/register/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "authorization: Bearer ".$access_token,
            "Content-Type: multipart/form-data"
        ));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response, true);

        if($httpcode == 200)
        {
            return $res;
        }

        return false;
    }

    public static function uploadImage($access_token, $image, $mime, $name, $temporary_key = null)
    {
        if($temporary_key == null)
        {
            $post['file'] = curl_file_create($image, $mime, $name);
        }
        else
        {
            $post['file'] = curl_file_create($image, $mime, $name);
            $post['temporary_key'] = $temporary_key;
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/account/temporary-image-storage/?access_token='.$access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: multipart/form-data"
        ));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response, true);

        if($httpcode == 200)
        {
            return $res;
        }

        return false;
    }

    public static function deleteImage($access_token, $temporary_key, $slot)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/account/temporary-image-storage/'.$temporary_key.'/?slot='.$slot.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "authorization: bearer ".$access_token,
            "Content-Type: application/x-www-form-urlencoded"
        ));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response, true);

        if($httpcode == 200)
        {
            return $res;
        }

        return false;
    }

	public static function category($access_token, $id)
	{
		$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/category/'.$id.'/?access_token='.$access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response, true);

        if($httpcode == 200)
        {
            if(isset($res['data']['children']))
            {
                if(count($res['data']['children']) > 0)
                {
                    $children = $res['data']['children'];
                }
                else
                {
                    $children = null;
                }
            }
            else
            {
                $children = null;
            }

            if(isset($res['data']['parent_id']))
            {
                $parent = $res['data']['parent_id'];
            }
            else
            {
                $parent = 0;
            }

            return response()->json([
                'st' => 'success',
                'msg' => 'Success',
                'children' => $children,
                'parent' => $parent,
                'id' => $res['data']['id'],
                'name' => $res['data']['names']['id'],
                'res' => $res
            ]);
        }

        return false;
	}

	public static function ads($access_token, $post)
	{
		$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, \Config::get('ajakteman.api_host').'/api/v2/account/advert/?access_token='.$access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = (array) json_decode($response, true);

        if($httpcode == 200 || $httpcode == 201)
        {
            return response()->json([
                'st' => 'success',
                'msg' => $res
            ]);
        }

        return response()->json([
            'st' => 'failed',
            'msg' => 'Isi formulir dengan benar.',
            'validation' => $res->error->validation,
        ]);
    }
}