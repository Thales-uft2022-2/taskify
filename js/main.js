document.addEventListener('DOMContentLoaded', () => {
    // Exemplo de interatividade: Adiciona animação ou validação extra nos formulários
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                // Dá um feedback visual de carregamento no botão
                submitBtn.style.opacity = '0.8';
                submitBtn.textContent = 'Carregando...';
            }
        });
    });

    // Mensagens de alerta que somem sozinhas após 4 segundos (se houverem)
    const alertMsg = document.querySelector('.error-msg, [style*="background-color: #d1fae5"]');
    if (alertMsg) {
        setTimeout(() => {
            alertMsg.style.transition = 'opacity 0.5s ease';
            alertMsg.style.opacity = '0';
            setTimeout(() => alertMsg.remove(), 500);
        }, 4000);
    }
});