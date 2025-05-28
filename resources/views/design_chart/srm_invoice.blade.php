<div style="font-family: Arial, sans-serif; padding: 20px; border: 1px solid #333; max-width: 900px; margin: auto;">
    <h2 style="text-align: center; margin-bottom: 5px;">SRM {{ $design->srm_no }}</h2>
    <hr style="border: 1px solid #000;">

    <table border="1" cellspacing="0" cellpadding="8" style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <tr>
            <th style="width: 25%; background-color: #f0f0f0;">மாடல் எண்</th>
            <td>{{ $design->srm_no }}</td>
            <th style="width: 25%; background-color: #f0f0f0;">வண்ணம்</th>
            <td>{{ $design->color_name }}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">தறி வகை</th>
            <td>{{ $design->loom_type }}</td>
            <th style="background-color: #f0f0f0;">ஆர்டர் வகை</th>
            <td>{{ $design->order_type }}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">பார்டி பெயர்</th>
            <td>{{ $design->party_name }}</td>
            <th style="background-color: #f0f0f0;">பார்டி மெட்ரஸ்</th>
            <td>{{ $design->party_mtr }}</td>
        </tr>
    </table>

    <h3 style="margin-top: 20px; margin-bottom: 10px;">Yarn Details</h3>
    <table border="1" cellspacing="0" cellpadding="8" style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <thead>
            <tr style="background-color: #f0f0f0;">
                <th>அ.இ</th>
                <th>வகை</th>
                <th>விவரம்</th>
                <th>மெட்ரஸ்</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($design->yarns as $index => $yarn)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $yarn->type }}</td>
                    <td>{{ $yarn->description }}</td>
                    <td>{{ $yarn->meters }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
