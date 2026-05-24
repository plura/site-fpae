# FPAE — Fórum Português de Administração Educacional

Institutional website for FPAE, built on WordPress.

This repository contains only the custom theme and plugin. WordPress core is not versioned.

## Repository structure

```
theme/    → fpae theme (child of Customizr)
plugin/   → fpae plugin (custom post types and features)
```

## Deployment

Deployment is done via FTP using the [SFTP](https://marketplace.visualstudio.com/items?itemName=Natiyszunk.sftp) VS Code extension.
Copy `.vscode/sftp.json.example` to `.vscode/sftp.json` and fill in the credentials.

Two contexts available:
- **FPAE Theme** → maps `theme/` to `/public_html/fpae.com.pt/wp/wp-content/themes/fpae` on the server
- **FPAE Plugin** → maps `plugin/` to `/public_html/fpae.com.pt/wp/wp-content/plugins/fpae` on the server

## Theme

Child theme of **Customizr**, located at `/public_html/fpae.com.pt/wp/wp-content/themes/fpae` on the server.

## Plugin

Custom plugin with the following post types:
- Events
- Members
- News
- Publications

Also includes multilingual support via qtranslate-x.
