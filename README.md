# Desafio Buildbox - Like: Plugin Wordpress

Olá! Seja bem-vindo(a) ao desafio WordPress da Buildbox.

Nosso objetivo é validar seus conhecimentos avançados em desenvolvimento com WordPress, além de habilidades com front-end.

Estamos à procura de alguém que vá além de customizar temas prontos e utilizar inúmeros plugins. Nossos projetos são criados de acordo com as necessidades de cada cliente, então o desafio é **criar um plugin WordPress do zero**.

Você tem 7 (sete) dias até a entrega final. Use todo este tempo para mostrar o seu melhor.

## Descrição do plugin

Você irá construir um plugin WordPress que permitirá aos visitantes classificarem publicações, chamado “Like”.  
Você precisa criar front-end e back-end baseado nas descrições e às funcionalidades propostas e que seja responsivo e performático.

O plugin deve conter as seguintes funções:

-  **Like/Dislike**: adicionar ao final do `content` dos `posts` dois botões: Like e Dislike. O botão de Like deve salvar uma adição a contagem de "popularidade" daquele post. O botão Dislike, deve subtrair. Estas ações devem ser feita via Ajax.
-  **Validação de voto**: Um visitante só pode manter **um voto** em cada post. Isto é, suas opções numa publicação seriam: dar Like, Dislike **ou** remover seu voto. Para isto, o uso de cookie ou localStorage é recomendado.
-  **Post Meta**: a contagem de popularidade deve ser salva num post meta, podendo ser apenas um número.
-  **Shortcode**: criar um shortcode `[top-liked]` que liste todos os posts que receberam votação, ordenados por popularidade.

### Diferenciais

-  Uso de SASS ou Tailwind.
-  Uso de boas práticas em todas as linguagens utilizadas.
-  Organização dos arquivos.

## Como enviar

Para submeter a resposta deste desafio, você deve fazer uma cópia **privada** deste repositório, usando a opção template.  
Com seu tema concluído e submetido, convide `wp@buildbox.com.br` como colaborador do seu fork, preencha e envie [este formulário](https://forms.clickup.com/f/xf5uw-4783/9X2E01YKFQB8UXNM03).  
Nele você colocará suas informações de identificação.  
Após isto, nós vamos instalar e avaliar seu tema.

Obrigado.  
Mãos à obra e boa sorte!
