# Guilherme Viana

## Configurações usadas no projeto

```bash
# PHP na versão 7.3 ou superior
# Laravel na versão: 8.0
# Padrão de Projetos MVC
# Utilizado banco MySQL com Laragon
```

### Requisitos para Execução

#### - Instalar Laragon
[https://laragon.org/download/index.html](https://laragon.org/download/index.html)

#### - Criar Banco de Dados
```bash
# Suponho que já tenha acessado o painel do laragon, agora clique em "Iniciar Tudo".
# Após isso, acesso o Banco de Dados e crie um novo com o seguinte nome: desafioappmax
# Pronto, já pode executar a API :)
```

## Passos para Executar API

```bash
# Instalar dependências
$ composer install

# Migrar tabelas do banco
$ php artisan migrate

# Api ficará em execução em localhost:8000
$ php artisan serve
```

### INSERIR DADOS NO BANCO

INSERT INTO `desafioappmax`.`products` (`tipo`, `marca`, `nome`, `tamanho`, `genero`, `sku`, `quantidade_atual`, `quantidade_antiga`, `created_at`, `updated_at`) VALUES ('Tênis', 'Nike', 'AIR FORCE', '42', 'Masculino', 'TEN-NIK-AFC-042-MAS', '234', '234', '2021-11-13 16:54:37', '2021-11-13 16:54:37');
INSERT INTO `desafioappmax`.`products` (`tipo`, `marca`, `nome`, `tamanho`, `genero`, `sku`, `quantidade_atual`, `quantidade_antiga`, `created_at`, `updated_at`) VALUES ('Tênis', 'Nike', 'AIR JORDAN', '38', 'Feminino', 'TEN-NIK-AJN-038-FEM', '234', '234', '2021-11-13 16:54:37', '2021-11-13 16:54:37');
INSERT INTO `desafioappmax`.`products` (`tipo`, `marca`, `nome`, `tamanho`, `genero`, `sku`, `quantidade_atual`, `quantidade_antiga`, `created_at`, `updated_at`) VALUES ('Tênis', 'Nike', 'AIR MAX INFINITY', '39', 'Unissex', 'TEN-NIK-AFC-039-UNI', '234', '234', '2021-11-13 16:54:37', '2021-11-13 16:54:37');
