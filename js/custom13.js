const tbody = document.querySelector(".listar-usuarios13");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list13.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);