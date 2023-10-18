const tbody = document.querySelector(".listar-usuarios15");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list15.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);