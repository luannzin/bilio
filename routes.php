<?php
class Rotas
{
    private array $rotas = [];

    public function get(string $caminho, array $dados)
    {
        $this->rotas["GET"][$caminho] = $dados;
    }

    public function post(string $caminho, array $dados_rota)
    {
        $this->rotas["POST"][$caminho] = $dados_rota;
    }

    public function route(string $metodo, string $url)
    {
        if (isset($this->rotas[$metodo][$url])) {
            $dados_rota = $this->rotas[$metodo][$url];

            $classe = new $dados_rota[0];
            $metodo = $dados_rota[1];
            return $classe->$metodo();
        }
        exit("Rota Invalida");
    }
}

$router = new Rotas();

$router->get("/", [inicioController::class, "index"]);

$router->get("/listar_categorias", [categoriaController::class, "listar"]);
$router->get("/inserir_categoria", [categoriaController::class, "inserir"]);
$router->post("/inserir_categoria", [categoriaController::class, "inserir"]);
$router->get("/alterar_categoria", [categoriaController::class, "alterar"]);
$router->post("/alterar_categoria", [categoriaController::class, "alterar"]);
$router->get("/excluir_categoria", [categoriaController::class, "excluir"]);
$router->get("/excluir_logico_categoria", [categoriaController::class, "excluir_logico"]);

$router->get("/listar_produtos", [produtoController::class, "listar"]);
$router->get("/inserir_produto", [produtoController::class, "inserir"]);
$router->post("/inserir_produto", [produtoController::class, "inserir"]);
$router->get("/alterar_produto", [produtoController::class, "alterar"]);
$router->post("/alterar_produto", [produtoController::class, "alterar"]);
$router->get("/excluir_produto", [produtoController::class, "excluir"]);
$router->get("/gerar_pdf", [produtoController::class, "gerar_pdf"]);

$router->get("/inserir_usuario", [usuarioController::class, "inserir"]);
$router->post("/inserir_usuario", [usuarioController::class, "inserir"]);
$router->get("/entrar", [usuarioController::class, "login"]);
$router->post("/entrar", [usuarioController::class, "login"]);
$router->get("/sair", [usuarioController::class, "logout"]);

$router->get("/produtos_mais_vendidos", [vendaController::class, "produtos_mais_vendidos"]);
$router->get("/buscar_dados_grafico", [vendaController::class, "buscar_dados_grafico"]);
$router->get("/inserir_carrinho", [vendaController::class, "inserir_carrinho"]);
$router->get("/excluir_carrinho", [vendaController::class, "excluir_carrinho"]);
$router->get("/alterar_carrinho", [vendaController::class, "alterar_carrinho"]);
$router->get("/inserir_venda", [vendaController::class, "inserir_venda"]);
$router->get("/mostrar_carrinho", [vendaController::class, "mostrar_carrinho"]);
$router->get("/alterar_quantidade", [vendaController::class, "alterar_quantidade"]);

?>