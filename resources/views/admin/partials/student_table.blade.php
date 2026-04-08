<div class="table-container">
    <table class="students-table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Class & Section</th>
                <th>Contact Info</th>
                <th>Parent/Guardian</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($data as $d)
            <tr>
                <td>
                    <div class="student-info">
                        <div class="student-avatar">
                            {{ strtoupper(substr($d->name,0,2)) }}
                        </div>
                        <div>
                            <div class="student-name">{{ $d->name }}</div>
                            <div class="student-id">ID: BSDLV {{ $d->id }}</div>
                        </div>
                    </div>
                </td>

                <td>{{ $d->class }} {{ $d->section ?? '' }}</td>

                <td>
                    <div>{{ $d->email }}</div>
                    <div>+91 {{ $d->phone }}</div>
                </td>

                <td>
                    <div>Mr. {{ $d->fname }}</div>
                </td>

                <td>
                    <span class="status-badge status-active">
                        {{ ucfirst($d->status ?? 'active') }}
                    </span>
                </td>

                <td>
                    <div class="action-buttons">
                        <button class="btn-icon btn-view"><i class="fas fa-eye"></i></button>
                        <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon btn-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-3">
    {{ $data->links() }}
</div>
