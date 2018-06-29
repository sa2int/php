//======================================================================================//
//
//						�Z���N�g�v���O����
//
//======================================================================================//
#include		<windows.h>
#include		<stdio.h>
#include		<math.h>
#include		"MASTER/Ci-Lib.H"
#include		"Game.H"

//****************************************************************************
//	��	��`
//
//****************************************************************************



//****************************************************************************
//	��	�����g�p�@�ϐ�
//
//****************************************************************************
GsTEXTURE SelectBG;
GsTEXTURE Ea;
GsTEXTURE Noma;
GsTEXTURE Har;
GsTEXTURE SEn1;
GsTEXTURE SEn2;
GsSOUND	  SBGM;

short SSS[3];
float SEPx[2], SEPy[2], SEDx[2], SEDy[2];
short SRo[2], SRoA[2];
short XCF,XCA;
//--------------------------------------------------------------------------//
//	��	������		�F�V�[���Ɉڂ鎞���A�ϐ��̏����� 
//
//--------------------------------------------------------------------------//
void	SelectInit(void)
{
	SRo[0] = 0;
	SRo[1] = 1;

	SRoA[0] = 5;
	SRoA[1] = -5;

	SEPx[0] = -200;
	SEPy[0] = 560;

	SEPx[1] = 2070;
	SEPy[1] = 710;

	SEDx[0] = 10.0f;
	SEDx[1] = -10.0f;

	SEDy[0] = 6.0f;
	SEDy[1] = -6.0f;

	XCF = 0;
	XCA = 1;
}

//--------------------------------------------------------------------------//
//	��	��������	�F�V�[�����̏����A���݂̃V�[���ōs������
//
//--------------------------------------------------------------------------//
void	SelectLoop(void)
{
	XCF = XCF + XCA;

	if (XCF >= 1 && XCF <= 1) {
		Gs_PlayBGM(SBGM);
	}

	if (XCF >= 2) {
		XCF = 0;
		XCA = 0;
	}

	DEB_TEXT(" �C�[�W�[%d",SSS[0]);
	DEB_TEXT(" �m�[�}��%d", SSS[1]);
	DEB_TEXT(" �n�[�h%d", SSS[2]);

	SEPx[0] = SEPx[0] + SEDx[0];
	SEPx[1] = SEPx[1] + SEDx[1];

	SEPy[0] = SEPy[0] + SEDy[0];
	SEPy[1] = SEPy[1] + SEDy[1];

	SRo[0] = SRo[0] + SRoA[0];
	SRo[1] = SRo[1] + SRoA[1];

	if (MsAREA(340 - 128, 540 - 150, 256, 360)) {
		SSS[0] = ON;
		if (Mouse.Trg &_lMOUSE) {
			SceneChange(GAME_SCENE);
		}
	}
	else
	{
		SSS[0] = OFF;
	}

	if (MsAREA(940 - 128, 540 - 150, 256, 360)) {
		SSS[1] = ON;
		if (Mouse.Trg &_lMOUSE) {
			SceneChange(TITLE_SCENE);
		}
	}

	else
	{
		SSS[1] = OFF;
	}

	if (MsAREA(1540 - 128, 540 - 150, 256, 360)) {
		SSS[2] = ON;
		if (Mouse.Trg &_lMOUSE) {
			SceneChange(RESULT_SCENE);
		}
	}

	else
	{
		SSS[2] = OFF;
	}

	
		
		if (SEPx[0] >= 2050) {
			SEDx[0] = -10.0f;
		}
		if (SEPx[0] <= -125) {
			SEDx[0] = 10.0f;
		}

		if (SEPy[0] >= 1140) {
			SEDy[0] = -6.0f;
			
		}
		if (SEPy[0] <= -125) {
			SEDy[0] = 6.0f;
		}
	
		if (SEPx[1] >= 2050) {
			SEDx[1] = -10.0f;
		}
		if (SEPx[1] <= -125) {
			SEDx[1] = 10.0f;
		}

		if (SEPy[1] >= 1140) {
			SEDy[1] = -6.0f;

		}
		if (SEPy[1] <= -125) {
			SEDy[1] = 6.0f;
		}
}

//--------------------------------------------------------------------------//
//	��	�`��		�F�V�[�����̕`��A���݂̃V�[���ŕ\������BMP�͂�����
//
//--------------------------------------------------------------------------//
void	SelectDraw(void)
{
	Gs_DrawLayer(940, 540, SelectBG, 0, 0, 1920, 1080, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(SEPx[0], SEPy[0], SEn1, 0, 0, 300, 302, OFF, ARGB(254, 255, 255, 254), ON, SRo[0], 1.0f, 1.0f);
	Gs_DrawLayer(SEPx[1], SEPy[1], SEn2, 0, 0, 300, 302, OFF, ARGB(254, 255, 255, 254), ON, SRo[1], 1.0f, 1.0f);
	Gs_DrawLayer(340, 540, Ea, 0, 0, 256, 360, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(940, 540, Noma, 0, 0, 256, 360, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(1540, 540, Har, 0, 0, 256, 360, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);

}

//--------------------------------------------------------------------------//
//	��	���[�h		�F�V�[���ɓ��鎞�A���̃V�[���ŕK�v�ȃf�[�^�̓ǂݍ���
//
//--------------------------------------------------------------------------//
short	SelectLoad(void)
{
	SelectBG = Gs_LoadBMP("DATA/BMP/�Z���N�g/�w�i.PNG");
	Ea = Gs_LoadBMP("DATA/BMP/�Z���N�g/Easy.PNG");
	Noma = Gs_LoadBMP("DATA/BMP/�Z���N�g/Normal.PNG");
	Har = Gs_LoadBMP("DATA/BMP/�Z���N�g/Hard.PNG");
	SEn1 = Gs_LoadBMP("DATA/BMP/�^�C�g��/������.PNG");
	SEn2 = Gs_LoadBMP("DATA/BMP/�^�C�g��/�������.PNG");
	SBGM = Gs_LoadWAVE("DATA/SOUND/�^�C�g��/�^�C�g��BGM.WAV ", ON);

	return		SELECT_SCENE;
}

//--------------------------------------------------------------------------//
//	��	�㏈��		�F���݂̃V�[�����甲���鎞�A�f�[�^�̔j��
//
//--------------------------------------------------------------------------//
void	SelectExit(void)
{
	Gs_ReleaseBMP(SelectBG);
	Gs_ReleaseBMP(Ea);
	Gs_ReleaseBMP(Noma);
	Gs_ReleaseBMP(Har);
	Gs_ReleaseBMP(SEn1);
	Gs_ReleaseBMP(SEn2);
	Gs_ReleaseSOUND(SBGM);
}

//****************************************************************************
//	���@�V�[���e�[�u���F�e�V�[���ŌĂяo�����֐��̓o�^
//****************************************************************************

SCENE_TBL	SelectSceneTbl = {
	SelectLoad,
	SelectInit,
	SelectLoop,
	SelectDraw,
	SelectExit
};

//======================================================================================//
//							EOP															//
//======================================================================================//
