# LockBox 🔒

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=for-the-badge&logo=sqlite&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/alpinejs-%238BC0D0.svg?style=for-the-badge&logo=alpine.js&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green?style=for-the-badge)

A secure and organized way to manage your private notes, receipts, and documents. Built with PHP, SQLite, and a modern frontend.

## 🚀 Features

- **Digital Vault**: Securely store and organize your important notes and receipts.
- **Privacy First**: Designed to keep your sensitive data protected.
- **Quick Search**: Instantly retrieve any document or note.
- **Secure Authentication**: Robust login and registration system with session management.
- **Custom MVC Architecture**: Built from scratch with a custom Router and Autoloader (PSR-4 style).
- **Encryption**: Two-layer encryption (AES-256-CBC + HMAC SHA3-512) for sensitive note content.

## ⚙️ Configuration

1.  **Environment Setup**
    Copy the example environment file:
    ```bash
    cp .env.example .env
    ```

2.  **Generate Encryption Keys**
    You **MUST** generate unique keys to secure your application. Run the following command in your terminal:
    ```bash
    # Generate First Key (32 bytes)
    php -r "echo base64_encode(openssl_random_pseudo_bytes(32));"

    # Generate Second Key (64 bytes)
    php -r "echo base64_encode(openssl_random_pseudo_bytes(64));"
    ```
    Paste the outputs into your `.env` file for `ENCRYPT_FIRST_KEY` and `ENCRYPT_SECOND_KEY`.

## 🛠 Tech Stack

- **Backend**: Native PHP 8.3+ (Class-based Controllers, Custom Routing)
- **Database**: SQLite
- **Frontend**: TailwindCSS + DaisyUI 5
- **Interactivity**: Alpine.js
- **Icons**: Phosphor Icons

## 📂 Project Structure

```bash
lockbox/
├── App/                # Application Logic
│   ├── Controllers/    # Class-based Controllers
│   └── Models/         # Data Models
├── Core/               # Framework Core (Router, DB, Validator)
├── config/             # Configuration files (Database, Routes)
├── public/             # Entry point (index.php)
└── views/              # UI Templates
```

## 📦 Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/rocketseat-education/php-lockbox.git
    cd lockbox
    ```

2.  **Start the server**
    You can use the built-in PHP server for development:
    ```bash
    php -S localhost:8888 -t public
    ```

3.  **Access the application**
    Open `http://localhost:8888` in your browser.

## 🤝 Contributing

Contributions are welcome! Please check the [CONTRIBUTING.md](CONTRIBUTING.md) file for guidelines on how to contribute to this project.

1.  Fork the project
2.  Create your feature branch (`git checkout -b feat/AmazingFeature`)
3.  Commit your changes (`git commit -m 'feat(scope): add some AmazingFeature'`)
4.  Push to the branch (`git push origin feat/AmazingFeature`)
5.  Open a Pull Request

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.
