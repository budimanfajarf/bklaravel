$(document).ready(function(){
    
    // Fungsi Search Siswa
    $('#search').keypress(function(event) {
        if (event.which == 13) {
            $.ajax({
                url      : "/api/students/" + $(this).val(),
                method   : "GET",
                dataType : "json"
            }).done(function(data){                    
                let table = "<table class='table table-striped'>" + 
                                "<tr>" +
                                    "<th>NIS</th>" +
                                    "<th>Nama</th>" +
                                    "<th>Kelas</th>" +
                                    "<th>Aksi</th>" +
                                "</tr>";
                $.each(data, function () {
                    let id   = this.id;  
                    let code = this.code;
                    let name = this.name;                         
                    let clas = this.class;
                    table += "<tr>" +
                                "<td>" + code + "</td>" +
                                "<td>" + name + "</td>" + 
                                "<td>" + clas + "</td>" +
                                "<td>" +
                                    "<input type='hidden' value='"+ id +"' name='id'>" +
                                    "<a href='#' class='add btn btn-outline-primary btn-sm' role='button'>Add</a>" +
                                "</td>" +
                              "</tr>";                        
                });                   
                table += "</table>"; 
                $("#table_container").empty();  
                $("#table_container").append(table);                         
            })
            return false;
        }
    });

    // Fungsi Click Add
    $(document).on("click", ".add", function(){
        let parentTr = $(this).parents("tr");
        let id   = parentTr.find("input[name='id']").val();
        let code = parentTr.find("td:eq(0)").text();
        let name = parentTr.find("td:eq(1)").text();
        let clas = parentTr.find("td:eq(2)").text();

        let addData = "<tr>" +
                        "<input type='hidden' name='students[id][]'   value='"+id+"'>" +
                        "<input type='hidden' name='students[code][]' value='"+code+"'>" +
                        "<input type='hidden' name='students[name][]' value='"+name+"'>" +
                        "<input type='hidden' name='students[clas][]' value='"+clas+"'>" +
                        "<td>" + code + "</td>" +
                        "<td>" + name + "</td>" +
                        "<td>" + clas + "</td>" +
                        "<td><a href='#' class='delete btn btn-outline-danger btn-sm' role='button'>Delete</a></td>" +
                      "</tr>";

        if ($("#table_added_container").find("table").length) {
            let added = false;
            $("#table_added input[name='students[id][]']").each(function(){
                if ($(this).val() === id) {
                    added = true;
                }                       
            }) 
            if (!added) {
                $("#table_added").append(addData); 
            }           
        } else {
            let addTable = "<label>Siswa yang sudah ditambahkan</label>";
            addTable += "<table id='table_added' class='table table-striped'>" + 
                        "<tr>" +
                            "<th>NIS</th>" +
                            "<th>Nama</th>" +
                            "<th>Kelas</th>" +
                            "<th>Aksi</th>" +
                        "</tr>";
            addTable += addData;                                   
            addTable += "</table>";
            $("#table_added_container").append(addTable);
        }
        return false;
    });  
    
    // Fungsi Click Delete
    $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
        if (!$("#table_added").find("td").length) {
            $("#table_added_container").empty();
        }
        return false;
    });     
        
});