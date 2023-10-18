const tbody = document.querySelector(".listar-usuarios14");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list14.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);