# ⚡ Taskify - Sistema Financeiro Moderno

Taskify é um sistema web moderno e responsivo desenvolvido em **PHP**, **MySQL (PDO)** e **XAMPP**, projetado para o controle e gestão financeira pessoal. Ele permite gerenciar receitas, despesas e acompanhar o saldo em tempo real de forma simples e intuitiva.

---

## ✨ Funcionalidades

* **Autenticação Segura:** Sistema de cadastro e login de usuários com criptografia de senha (`password_hash`).
* **Painel Financeiro em Tempo Real:** Visualização imediata do total de receitas, total de despesas e saldo atual em conta.
* **Gestão de Lançamentos:** Adição e exclusão de receitas e despesas com registro de data e descrição.
* **Interface Moderna:** Design limpo, responsivo e com animações suaves.
* **Arquitetura Modular:** Organizado com componentes reutilizáveis (cabeçalho, rodapé e conexão centralizada).

---

## 📂 Estrutura de Pastas

```text
taskify/
│
├── assets/
│   ├── css/
│   │   └── style.css            # Estilos globais e responsivos
│   └── js/
│       └── main.js              # Scripts de interatividade
│
├── includes/
│   ├── db.php                   # Conexão com o MySQL via PDO
│   ├── header.php               # Cabeçalho padrão reutilizável
│   └── footer.php               # Rodapé padrão reutilizável
│
├── index.php                    # Página inicial moderna e de apresentação
├── login.php                    # Tela de autenticação
├── register.php                 # Tela de cadastro de novos usuários
├── dashboard.php                # Painel principal financeiro
├── logout.php                   # Script para encerramento de sessão
└── database.sql                 # Script SQL para criação do banco e tabelas
```

---

## 🚀 Como Rodar o Projeto no XAMPP

1. **Pré-requisitos:** Certifique-se de ter o [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado com o **Apache** e o **MySQL** ativos.
2. **Clonar ou Baixar:** Coloque a pasta do projeto `taskify` dentro do diretório padrão do servidor local (`C:\xampp\htdocs\taskify\`).
3. **Configurar o Banco de Dados:**
   * Abra o [phpMyAdmin](http://localhost/phpmyadmin).
   * Crie um banco de dados ou execute o script contido em `database.sql` para criar automaticamente as tabelas `usuarios` e `transacoes`.
4. **Acessar o Sistema:**
   * Abra o seu navegador e acesse: `http://localhost/taskify/`

---

## 🛠️ Tecnologias Utilizadas

* **PHP** (Lógica do back-end e sessões)
* **MySQL / PDO** (Banco de dados relacional e consultas seguras)
* **HTML5 & CSS3** (Interface visual moderna e estilização flexível)
* **JavaScript** (Interatividade e dinamismo na interface)

---

## 📄 Licença
Este projeto é de uso livre para estudos e desenvolvimento pessoal.