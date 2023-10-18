const tbody = document.querySelector(".listar-usuarios3");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list3.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);