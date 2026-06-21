import React, { useState } from 'react'
import imageLogin from '@images/loginPhoto.jpg';
import { Link, useLocation } from 'react-router';
import AppInput from '../../Components/AppInput/AppInput';
import AppButton from '../../Components/AppButton/AppButton';
export default function Login() {
    const location = useLocation();
    const [emailValue, setEmailValue] = useState('');
    const [passwordValue, setPasswordValue] = useState('');
    return (
        <div className='w-full h-dvh bg-Primary flex justify-center items-center'>
            <div className='w-full max-w-4/5 mx-auto h-fit lg:h-2/3 bg-background flex justify-between p-3 rounded-md flex-col lg:flex-row gap-4 '>
                <div className='flex items-start justify-evenly flex-col lg:w-2/5 order-2 lg:order-1 p-3'>
                    <h1 className='text-2xl font-bold my-2'>صفحه ورود</h1>
                    <form action="" className='w-full flex flex-col gap-4'>
                        <div className='flex gap-4'>
                            <Link to='/register' className={`font-bold hover:text-Primary ${location.pathname == '/register' ? "text-Primary" : "text-Secondary"}`}>ثبت نام</Link>
                            <Link to='/login' className={`font-bold hover:text-Primary ${location.pathname == '/login' ? "text-Primary font-bold" : "text-Secondary"}`}>ورود</Link>
                        </div>
                        <AppInput titleLabel={'ایمیل'} textPlaceholder={'لطفا ایمیل خود را وارد کنید'} typeInput={'email'} inputVal={emailValue} chnageValue={(e) => setEmailValue(e.target.value)} />
                        <AppInput titleLabel={'پسورد'} textPlaceholder={'لطفا پسورد خود را وارد کنید'} typeInput={'text'} inputVal={passwordValue} chnageValue={(e) => setPasswordValue(e.target.value)} />
                        <AppButton textBtn={'ورود'} typeBtn={'button'} bgBtn={'bg-Primary'} textColor={'text-white'} hoverBtn={'hover:bg-PrimaryHover'} />
                    </form>
                </div>
                <img src={imageLogin} alt="path" className='lg:w-3/5 rounded-sm order-1 lg:order-2' />
            </div>
        </div>
    )
}
