# gwnu_webdb
웹데이터베이스프로그램설계및실습 학사관리시스템 구현 팀 과제

코드 통합 후 작동 여부만을 체크하였으며 추후 재작성할 예정입니다.

## 메뉴

### 학적관리

- [X] 개인정보 관리
- [X] 휴학신청
- [X] 복학신청

### 수업관리

- [ ] 시간표 조회
- [X] 강의 관리
- [X] 설문조사 진행
- [ ] 수업계획서 조회
- [ ] 수업계획서 등록

### 성적관리

- [X] 성적 확인
- [X] 성적 부여

### 등록관리

- [X] 학기 등록 신청
- [X] 학기 등록 취소

## 흐름

+ 학적관리 -> 개인정보관리 personal_information.html, personal_information.php -> 개인정보조회 get_personal_information.php -> 개인정보수정 set_personal_infromation.php
+ 학적관리 -> 휴학신청 break.html, break.php -> 휴학처리 break_func.php
+ 학적관리 -> 복학신청 go_back.html, go_back.php -> 복학처리 go_back_func.php
+ 수업관리 -> 강의관리 lecture.html, lecture.php -> 조회 lecture_lookup.php
+ 수업관리 -> 강의관리 lecture.html, lecture.php -> 등록 lecture_create.php -> 실제 등록 lecture_create_func.php
+ 수업관리 -> 강의관리 lecture.html, lecture.php -> 수정 lecture_update_delete.php -> 실제 수정 lecture_update_func.php
+ 수업관리 -> 강의관리 lecture.html, lecture.php -> 삭제 lecture_update_delete.php
+ 수업관리 -> 설문조사 진행 survey.html, survey.php -> 과목 선택 후 설문조사 양식 survey_form.php ->  설문조사 제출 survey_func.php
+ 성적관리 -> 성적확인 get_score.html, get_score.php -> 성적조회 get_score_func.php
+ 성적관리 -> 성적부여 set_score.html, set_score.php -> 강의조회 set_score_subjects.php -> 강의선택 set_score_subject.php -> 성적부여 set_score_subject_func.php -> 성적부여 화면 이동
+ 등록관리 -> 학기 등록 신청 term_reg.html, term_reg.php -> 등록 term_reg_func.php -> 메인화면 이동
+ 등록관리 -> 학기 등록 취소 term_cancel.html, term_cancel.php -> 취소 term_cancel_func.php -> 메인화면 이동

## 해결해야할 문제

// 학기 등록에서 휴복학 여부를 확인할 필요가 있어보임
// 교수인데 점수 조회 불가능함