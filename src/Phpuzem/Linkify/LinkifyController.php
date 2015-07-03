<?php

namespace Phpuzem\Linkify;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class LinkifyController extends Controller {

    private $expire;
    private $objectpath;
    private $bucketname;

    public function make()
    {
        return new LinkifyController();
    }

    public function expire($expire)
    {
        $this->expire = time() + ($expire * 60);
        return $this;
    }

    public function objectpath($objectpath)
    {
        $this->objectpath = ltrim($objectpath, '/');
        return $this;
    }

    public function bucketname($bucketname)
    {
        $this->bucketname = $bucketname;
        return $this;
    }

    private function signature()
    {
        $signature = "GET\n\n\n$this->expire\n" . '/' . $this->bucketname . '/' . $this->objectpath;
        return $signature;
    }

    private function hashedsignature()
    {
        $hashedSignature = base64_encode(hash_hmac('sha1', $this->signature(), Config::get('linkify.awssecret'), true));
        return $hashedSignature;
    }

    private function url()
    {
        $url = sprintf('http://%s.s3.amazonaws.com/%s', $this->bucketname, $this->objectpath);
        return $url;
    }

    private function querystring()
    {
        $queryString = http_build_query([
            'AWSAccessKeyId' => Config::get('linkify.awsaccesskey'),
            'Expires'        => $this->expire,
            'Signature'      => $this->hashedsignature()
        ]);
        return $queryString;
    }

    public function get()
    {
        return $this->url() . '?' . $this->querystring();
    }

}
