@extends('layouts.home')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/department.css')}}">

	<!-- 主体内容代码开始 -->

	<div class="content">

		<!-- 左边代码开始 -->

		<div class="contentLeft">

			<h1>优秀教师</h1>
			
			@foreach($data as $d)
			<div class="contentLeftBox">
				<a href="{{url('tea/'.$d->tea_id)}}">
					<img src="{{$d->tea_src}}">
					<p>{{$d->tea_job}}</p>
				</a>
			</div>
			@endforeach
			
		</div>

		<!-- 左边代码结束 -->
		
		<!-- 右边代码开始 -->

		<div class="contentRight">
			
			<h1>番禺职业技术学院思想政治理论课教学部德育教研室简介</h1>
 
		　　<p>德育教研室是我院思想政治理论课教学部下属的、从事马克思主义理论与思想政治教育类课程教学工作的教学单位，现主要承担着全院的《毛泽东思想、邓小平理论和“三个代表”重要思想概论》、《思想道德修养与法律基础》、《形势与政策》和《廉洁修身》四门必修课程和相关选修课程的教学任务。教研室拥有较强的师资队伍，专职教师13人，其中副高职称以上的有4人；拥有硕士以上学位的占76%；在知识结构上，由从事思想政治教育、法学和历史学等专业人员构成，是一支年富力强，教学经验丰富，敬业心强，锐意改革，开拓进取的教学科研团队。</p>

		　　<p>近几年来，教研室在教学科研上取得了较为显著的成绩。在教学上，多年来一直保持着学院学生评教优秀和良好的反映，在2005年教育部对学院进行的人才培养水平评估中，思想政治理论课取得了“学生最喜欢的课程” 评选的第一名和评估专家的好评。教研室多名教师取得了教学改革与教学科研成果的奖励，获得广东省高校教学成果二等奖一项，广州市、学院教学成果多项，近两年就有5人次获得学院“优质课”奖。《思想道德修养与法律础》课程于2003年被立项为学院“精品课建设项目”，2005年通过验收，2006年获得学院院级精品课奖励；2006年又获得了广东省教育厅立项的全省首批高校思想政治理“优质建设课程”并于2008年通过验收。在致力教学的同时，科研工作也取得了显著成绩，在教学与学术研究上，承担省级、市级和院级课题十余项；近3年来多种刊物上发表论文30多篇，主编教材1部。</p>

		　　<p>德育教研室本着教书育人的基本宗旨，充分发挥马克思主义理论与思想政治理论教育主渠道和主阵地的作用，围绕培养中国特色社会主义的建设者和接班人的教育目标，按照教学大纲制订授课计划，精心备课，认真讲授，充分利用现代化教学手段，努力提高思想政治理论教学的针对性、时效性；以“传道、授业、解惑”的教育精神，运用马克思主义理论的科学思想与方法，针对学生日常学习、工作和生活中可能出现的人生挫折、思想变化、心理困惑、社会交往及择业就业等具体、实际问题，进行系统教育与研讨，引导大学生树立科学的思想观念，不断地提升与完善自身的思想道德、科学文化和职业素质，实现高职大学生在适应社会、服务一线、超越自我、贡献社会的特色与特长。</p>

		　　<p>德育教研室结合实施思想政治理论课“05方案”，结合广东省思想政治理论课“优质建设课程”和广东省教育厅思想政治理论教育重点课题“大众化教育背景下《思想道德修养与法律基础》课程体系与教学模式研究” 以及广州市、学院相关教学研究课程的建设与研究工作，将进一步深化教育思想与教学模式、方法的研究和实施工作，积极探索我院思想政治理论课教学的新路子，巩固与探索实践教学的新渠道、新方法，提高社会实践教学的质量与水平，扩建一批与思想政治理论教学和学生学习、认识社会密切联系，能够有助于学生加深思想认识和对有中国特色社会主义建设实际理解的实践教学基地。进一步完善学生深入社会调查研究的制度化建设工作，搞好社会调查及总结，丰富我院思想政治理论课教学的内容。探索并完善我院思想政治工作的分工协作机制，使思想政治理论教育的主渠道和主阵地作用更好、更充分地发挥。</p>

		　　<p>德育教研室办公地址在学院2号的2308室，内线电话为：8291；教研室的公共邮箱是：SXZZLL@pyp.edu.cn。欢迎各位朋友能给予我们更多的建议与指教。</p>


		</div>

		<!-- 右边代码结束 -->

	</div>

	<!-- 主体内容代码结束 -->

@endsection