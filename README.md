# FPAE — Fórum Português de Administração Educacional

Website institucional do FPAE, construído em WordPress.

Este repositório contém apenas o tema e plugin personalizados. O WordPress core não está versionado.

## Estrutura do repositório

```
theme/    → tema fpae (filho de Customizr)
plugin/   → plugin fpae (custom post types e funcionalidades)
```

## Deployment

O deploy é feito via FTP usando a extensão [SFTP](https://marketplace.visualstudio.com/items?itemName=Natiyszunk.sftp) do VS Code.
Copiar `.vscode/sftp.json.example` para `.vscode/sftp.json` e preencher as credenciais.

Dois contextos disponíveis:
- **FPAE Theme** → mapeia `theme/` para `wp/wp-content/themes/fpae` no servidor
- **FPAE Plugin** → mapeia `plugin/` para `wp/wp-content/plugins/fpae` no servidor

## Tema

Tema filho de **Customizr**, alojado em `wp/wp-content/themes/fpae` no servidor.

## Plugin

Plugin personalizado com custom post types:
- Eventos
- Membros
- Notícias
- Publicações

Inclui também suporte multilingue via qtranslate-x.
