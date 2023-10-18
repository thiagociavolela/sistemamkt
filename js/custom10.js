const tbody = document.querySelector(".listar-usuarios10");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list10.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);