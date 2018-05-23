<el-header style="font-size: 12px; height: 100px">
    <el-row :gutter="20">
        <el-col :span="4">
            <resource type="wood"
                      amount="{{ auth()->user()->resources->where('name', 'wood')->first()->pivot->amount }}"
            ></resource>
        </el-col>
        <el-col :span="4">
            <resource type="stone"
                      amount="{{ auth()->user()->resources->where('name', 'stone')->first()->pivot->amount }}"
            ></resource>
        </el-col>
        <el-col :span="4">
            <resource type="food"
                      amount="{{ auth()->user()->resources->where('name', 'food')->first()->pivot->amount }}"
            ></resource>
        </el-col>
        <el-col :span="4">
            <resource type="metal"
                      amount="{{ auth()->user()->resources->where('name', 'metal')->first()->pivot->amount }}"
            ></resource>
        </el-col>
        <el-col :span="4">
            <resource type="gold"
                      amount="{{ auth()->user()->resources->where('name', 'gold')->first()->pivot->amount }}"
            ></resource>
        </el-col>
    </el-row>
</el-header>