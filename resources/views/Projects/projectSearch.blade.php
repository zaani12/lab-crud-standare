@foreach ($Projects as $Project)
    <tr>
        <td>{{ $Project->nom }}</td>

        <td>{{ Str::limit($Project->description, 30) }} <a href="">read more...</a></td>

        <td class="d-flex">
            <a href="" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $Projects->links() }}
        </div>

    </td>
</tr>