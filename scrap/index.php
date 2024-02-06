<?php
include("../vendor/autoload.php");

echo 'scraping';

// URL do post do Instagram
$url = 'https://www.instagram.com/p/C28aOaXsFEB/';

// Fazendo a solicitação HTTP para obter o conteúdo da página
$html = file_get_contents($url);

// Criando um novo objeto DOMDocument
$dom = new DOMDocument();

// Carregando o HTML da página
$dom->loadHTML($html);

// Localizando todos os elementos <script> na página
$scripts = $dom->getElementsByTagName('script');

// Inicializando uma variável para armazenar o conteúdo do script que contém os comentários
$comments_script = '';

// Iterando sobre os elementos <script> para encontrar o que contém os comentários
foreach ($scripts as $script) {
    // dump($script);
    // Verificando se o script contém dados de comentários
    if (strpos($script->nodeValue, 'window._sharedData') !== false) {
        $comments_script = $script->nodeValue;
        break;
    }
}

// Extraindo os dados de comentários do script usando expressões regulares
$pattern = '/window\._sharedData\s*=\s*({.*?});\s*<\/script>/s';
preg_match($pattern, $comments_script, $matches);

// Decodificando os dados JSON
$data = json_decode($matches[1], true);

// Verificando se os dados foram decodificados com sucesso e se existem comentários
if (isset($data['entry_data']['PostPage'][0]['graphql']['shortcode_media']['edge_media_to_parent_comment']['edges'])) {
    // Obtendo os comentários
    $comments = $data['entry_data']['PostPage'][0]['graphql']['shortcode_media']['edge_media_to_parent_comment']['edges'];

    // Iterando sobre os comentários e exibindo-os
    foreach ($comments as $comment) {
        $comment_text = $comment['node']['text'];
        echo $comment_text . "<br>";
    }
} else {
    echo "Nenhum comentário encontrado.";
    echo "<br/>";
}

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

// URL do post do Instagram
$url = 'https://www.instagram.com/p/C0F8w3TsXjU/';
// Cria um cliente Goutte
// Cria um cliente Goutte
$client = new Client(HttpClient::create(['timeout' => 120]));

// Faz a solicitação GET para a URL do post do Instagram
// $crawler = $client->request('GET', $url);
// Faz a solicitação GET para a URL do post do Instagram
$crawler = $client->request('GET', $url);
dump($crawler->filter('div[class="x1i10hfl"] span'));
// $crawler->waitFor('.x9f619.xjbqb8w.x78zum5.x168nmei');

// $commentsList = $crawler->filter('.x9f619.xjbqb8w.x78zum5.x168nmei div');
$comments = $crawler->filter('div.x1i10hfl')->each(function (Crawler $node, $i) {
    return $node->text();
});

foreach ($comments as $comment) {
    echo $comment . "<br>";
}
// dump($crawler->filter('span[class="andes-money-amount__fraction"]'));
// Localiza todos os elementos HTML que contêm os comentários
// $comments = $crawler->filter('span[class="andes-money-amount__fraction"]')->each(function ($node) {
//     // dump($node);
//     return $node->text();
// });

// // Exibe os comentários
// foreach ($comments as $comment) {
//     echo $comment . "<br>";
// }
// Verifica se o elemento foi encontrado
// if ($commentsList->count() > 0) {
//     // Itera sobre os itens da lista de comentários
//     $comments = $commentsList->filter('li')->each(function ($node) {
//         return $node->text();
//     });

//     // Exibe os comentários
//     foreach ($comments as $comment) {
//         echo $comment . "<br>";
//     }
// } else {
//     echo "Elemento de comentários não encontrado.";
// }


// $crawler2 = $client->request('GET', 'https://www.instagram.com/api/v1/media/3270398967836324777/comments/?can_support_threading=true&permalink_enabled=false');
// dump($crawler2);
?>