<script>  
    @if(Session::has('success'))  
            toastr.success("{{ Session::get('success') }}");  
    @endif  
    @if(Session::has('update'))  
            toastr.success("{{ Session::get('update') }}");  
    @endif  
    @if(Session::has('delete'))  
            toastr.success("{{ Session::get('delete') }}");  
    @endif  
    @if(Session::has('error'))  
            toastr.error("{{ Session::get('error') }}");  
    @endif  
</script>