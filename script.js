document.addEventListener("DOMContentLoaded", () => {
    const queryParams = new URLSearchParams(window.location.search);
    const dados = queryParams.get("dados");

    if (dados) {
        const dadosReuniao = JSON.parse(decodeURIComponent(dados));
        const container = document.getElementById("dados-reuniao");

        container.innerHTML = `
            <p><strong>Nome do Cadastro:</strong> ${dadosReuniao.nome}</p>
            <p><strong>Quantidade de Participantes:</strong> ${dadosReuniao.participantes}</p>
            <p><strong>Importância:</strong> <span style="background-color: ${dadosReuniao.importancia}; padding: 5px;">${dadosReuniao.importancia}</span></p>
            <p><strong>Tipo de Reunião:</strong> ${dadosReuniao.tipo}</p>
            <p><strong>Link para mais informações:</strong> <a href="${dadosReuniao.link}" target="_blank">${dadosReuniao.link}</a></p>
            <p><strong>Imagem:</strong> ${
                dadosReuniao.imagem.startsWith("imagens/")
                    ? `<br><img src="${dadosReuniao.imagem}" alt="Imagem da Reunião" style="max-width: 300px;">`
                    : dadosReuniao.imagem
            }</p>
        `;
    }
});
