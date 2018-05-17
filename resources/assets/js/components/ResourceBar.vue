<template>
    <div class="container">
        <el-row :gutter="20">
            <el-col :span="6">
                <div class="grid-content bg-purple" style="text-align:center;">
                    <b>Gold</b>
                    <el-slider
                            v-model="value7"
                            :step="10"
                            >
                    </el-slider>
                </div>
            </el-col>
            <el-col :span="6">
                <div class="grid-content bg-purple"></div>
            </el-col>
            <el-col :span="6">
                <div class="grid-content bg-purple"></div>
            </el-col>
            <el-col :span="6">
                <div class="grid-content bg-purple"></div>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                value6: 0,
                value7: 0
            }
        }
    }
</script>
