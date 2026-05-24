# FPAE — Fórum Português de Administração Educacional

Website institucional do FPAE, construído em WordPress.

## Estrutura do repositório

```
/               → raiz pública (index.php, .htaccess)
wp/             → instalação WordPress
wp/wp-content/  → temas e plugins
```

O ficheiro `wp/wp-config.php` não está versionado — é necessário criá-lo localmente a partir do `wp/wp-config-sample.php`.

## Temas

- **fpae** — tema ativo (filho de Customizr)
- customizr — tema pai

## Plugins

- fpae — plugin personalizado
- qtranslate-x — suporte multilingue
- akismet — proteção anti-spam

## Deployment

O deploy é feito via FTP usando a extensão [SFTP](https://marketplace.visualstudio.com/items?itemName=Natizyskunk.sftp) do VS Code.  
Copiar `.vscode/sftp.json.example` para `.vscode/sftp.json` e preencher as credenciais.

## Requisitos locais

- PHP 7+
- MySQL / MariaDB
- Servidor web (Apache/Nginx) com `mod_rewrite` activo
