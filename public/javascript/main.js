
function contactAlert() {
    alert("Sikeresen rögzítettük az üzeneted!");
}
function registrateAlert() {
    alert("A regisztrációd sikeres!");
}
$(document).ready(function() {
    $('#memberSearch').DataTable({

        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ tagból",
            "infoFiltered": "(_MAX_  tagból szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );
$(document).ready(function() {
    $('#trainerSearch').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ edzőből",
            "infoFiltered": "(_MAX_  edzőből szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );
$(document).ready(function() {
    $('#planSearch').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ bérletből",
            "infoFiltered": "(_MAX_  bérletből szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );
$(document).ready(function() {
    $('#membershipSearch').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ tagságból",
            "infoFiltered": "(_MAX_  tagságból szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );
$(document).ready(function() {
    $('#userSearch').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ felhasználóból",
            "infoFiltered": "(_MAX_  felhasználóból szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );
$(document).ready(function() {
    $('#messageSearch').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ üzenetből",
            "infoFiltered": "(_MAX_  üzenetből szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );
$(document).ready(function() {
    $('#paymentSearch').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ befizetésből",
            "infoFiltered": "(_MAX_  befizetésből szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
       
    });
} );
$(document).ready(function() {
    $('#trainerSearchForMembers').DataTable({
        "language": {
            "lengthMenu": 'Találatok <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Összes</option>'+
                        '</select>',
            "paginate": {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó",
            },
            "search": "Keresés:",
            "info":"_START_ - _END_ találat / _TOTAL_ edzőből",
            "infoFiltered": "(_MAX_  edzőből szűrve)",
            "infoEmpty": " 0 találat",
            "zeroRecords":    "Nincs ilyen adat!",
            "emptyTable":     "Nincs adat a táblázatban!",
        }
        
    });
} );



