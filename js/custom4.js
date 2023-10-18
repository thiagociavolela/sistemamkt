const tbody = document.querySelector(".listar-usuarios4");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list4.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);