<script type="text/javascript">
$(function() {
    var datasource = {!! json_encode($tree) !!};
    var nodeTemplate = function(data) {
        if(data.spouse) {
            return `@include('node_spouse')`;    
        } else {
            return `@include('node')`;
        }
        
    };

    $('#chart-container').orgchart({
        'data' : datasource,
        'nodeContent': 'title',
        'nodeTemplate': nodeTemplate,
        'pan': true,
        'zoom': true
    });
    
});
</script>