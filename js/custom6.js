const tbody = document.querySelector(".listar-usuarios6");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list6.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);