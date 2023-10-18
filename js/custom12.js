const tbody = document.querySelector(".listar-usuarios12");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list12.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);