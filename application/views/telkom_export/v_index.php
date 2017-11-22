<br><br>
<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-primary">
            <div class="panel-heading"> <h3 class="panel-title">Daftar Sensor</h3> </div>
            <div class="panel-body">
                <!--  -->
                <a href="<?php echo base_url()."sensor/add";?>" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
                <hr>
                <table class="table table-hover" id="data">
                <thead> <tr> <th>Nama</th> <th>ID Sensor</th> </tr> </thead>
                <tfoot> <tr> <th>Nama</th> <th>ID Sensor</th> </tr> </tfoot> 
                <tbody>
                    <?php foreach ($query->result() as $row){?>
                    <tr>

                    <td><?php echo $row->nama_link;?></td>
                    <td><?php echo $row->sensor_ping;?></td>
                    

                    </tr>
                    <?php } ?>  
                </tbody>
                </table>
            </div> <!--panel panel-body-->  
        </div> <!--panel panel-primary-->   
    </div> <!--col-md-->
</div> <!-- row-->

<script type="text/javascript">
    $(document).ready(function(){
        // Setup - add a text input to each footer cell
        $('#data tfoot th').each( function () {
            var title = $(this).text();
            if(title !=''){
                 $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            }
           
        });
        
        // DataTable
        var table = $('#data').DataTable();   
        
        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            });
        } );
    });
</script>