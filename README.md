# Like: Plugin Wordpress

Este plugin WordPress permite aos visitantes classificarem publicações, com like e dislike.  
### Funções:

-  **Like/Dislike**: adiciona ao final do `content` dos `posts` dois botões: Like e Dislike. O botão de salva uma adição a contagem de "popularidade" daquele post. O botão Dislike, subtrai. Estas ações são feitas via Ajax.
-  **Validação de voto**: Um visitante só pode manter **um voto** em cada post. Isto é, suas opções numa publicação são: dar Like, Dislike **ou** remover seu voto. Para isto, é utilizado localStorage.
-  **Post Meta**: a contagem de popularidade deve ser salva num post meta, podendo ser apenas um número.
-  **Shortcode**: É gerado o shortcode `[top-liked]` que lista todos os posts que receberam votação, ordenados por popularidade.

### Frontend

-  Utiliza Tailwind.
