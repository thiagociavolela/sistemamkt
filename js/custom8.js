const tbody = document.querySelector(".listar-usuarios8");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list8.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);