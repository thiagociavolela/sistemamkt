const tbody = document.querySelector(".listar-usuarios11");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list11.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);