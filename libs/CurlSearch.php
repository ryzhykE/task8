<?php


class CurlSearch
{
    protected $page;
    protected $result;
    protected $data= [];

    public function getHtmlPage()
    {
        $headers = [
            'authority:www.google.com',
            'method:POST',
            'path:/u/0/widget?sourceid=1&hl=ru&origin=https%3A%2F%2Fwww.google.com.ua&uc=1&usegapi=1&jsh=m%3B%2F_%2Fscs%2Fabc-static%2F_%2Fjs%2Fk%3Dgapi.gapi.en.pwuFxAM9sSs.O%2Fm%3D__features__%2Frt%3Dj%2Fd%3D1%2Frs%3DAHpOoo_kFxiSkGFruvghs_M-2UjERAt_Iw',
            'scheme:https',
            'accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'accept-language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
            'content-length:0',
            'content-type:text/html;charset=UTF-8',
            'cookie:HSID=AO2xW-k4lm6TsFcmp; SSID=ATk15KdfUSMHbCe4A; APISID=azPmral9fZmQ0Qa8/A0Edmo9KK3tvDKbCu; SAPISID=CexIbiH_3APPsZOP/Ak_n6ygvvg86PrzJ1; OSID=XgQxViw3zGt7VeN4Wfc4L2a9hGlS4CJ6bDZdkj8HZdtwUjlqjh6aykbaguzI9bKtz5XqXA.; SID=nQQxVgPVgQ553wZ0sjicMWdwhYzMFlZwD2OzIqwazNfAgvnrZ0hKjYYYBooUH3h6kb31Sg.; OTZ=3975200_44_48_123900_44_436380; NID=109=jJrILOV5TYrnSNw-_0sH3R1RYqw9P0bAA7BkilERHDNZMvl7DKnST02Af2bDEXGvnsjlMTJDGY5W8T-F-xdtPM4BtTmeBEqHIBOORtgL8rteycuT_K4KMWOQEvDPx0KslJYCPiQX-TKdYMSutdqpPF1R-2BuNQ0Bnt1TLnnW8H6a2epguibY0BcxJk8ZwG7hIzW8RQ; SIDCC=AA248bd8aVtQif2ZaxO7zEA8Lku46nxE2R1F0_jTp450YB5GXfAGDKqEBn2EGqe58hO6FRWMBdo8ropllYLl',
            'referer:https://www.google.com/',
            'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36',
            'x-client-data:CJK2yQEIo7bJAQjBtskBCIuYygEI+5zKAQipncoB'
        ];

        $adress = 'https://www.google.com/search?q=' ;
        $query = $this->getPost();
        $ch = curl_init($adress.$query);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $this->page = curl_exec($ch);
        curl_close($ch);
    }


    public function getPost()
    {
        if(isset($_POST['query']) &&  null !== $_POST['query'] )
        {
            $postq = str_replace(" ", "+", $_POST['query']);
            return $postq;
        }

    }

    public function enterPage()
    {
        $dataPage = new DOMDocument();
        @$dataPage->loadHTML($this->page);
        $domX = new DomXPath($dataPage);
        $result = $domX->query("//*[contains(@class, 'rc')]");
         for($i = 0; $i < $result->length; $i++)
        {
            $this->data[$i]=[
                'name'=>$result->item($i)->firstChild->firstChild->nodeValue,
                'link'=>$result->item($i)->firstChild->firstChild->getAttribute('href'),
                'description'=>$result->item($i)->getElementsByTagName('span')->item(1)->nodeValue
            ];

        }
        return $this->data;
    }
}